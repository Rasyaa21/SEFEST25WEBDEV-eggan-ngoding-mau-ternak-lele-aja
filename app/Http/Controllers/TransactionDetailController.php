<?php
namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Midtrans\Config;
use Midtrans\Snap;

class   TransactionDetailController extends Controller
{
    public function __construct()
    {
    }
    
    public function create(Request $request)
{
    // Midtrans Configuration
    \Midtrans\Config::$serverKey = "SB-Mid-server-zzOVDX4CerE9FBw903E57Qxw";
    \Midtrans\Config::$clientKey = "SB-Mid-client-AcN39HdcG6CVof4m";
    \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
    \Midtrans\Config::$isSanitized = env('MIDTRANS_IS_SANITIZED', true);
    \Midtrans\Config::$is3ds = env('MIDTRANS_IS_3DS', true);

    $userId = "1";
    $userEmail = "axel@gmail.com";
    
    if (!$userId) {
        return response()->json(['error' => 'Anda harus login terlebih dahulu!'], 401);
    }

    try {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'receiver' => 'required|string',
            'address' => 'required|string',
            'phone_number' => 'required|string',
            'note' => 'nullable|string',
        ]);

        $invoiceFormat = "INV-" . date('ymd') . "-" . strtoupper(str()->random(5));
        
        // Setup Midtrans parameter
        $params = [
            'transaction_details' => [
                'order_id' => $invoiceFormat,
                'gross_amount' => $validatedData['amount']
            ],
            'customer_details' => [
                'first_name' => $validatedData['receiver'],
                'email' => $userEmail,
                'phone' => $validatedData['phone_number'],
                'billing_address' => [
                    'address' => $validatedData['address']
                ]
            ],
            'enabled_payments' => ['qris'],
            'payment_type' => 'qris'
        ];

        try {
            // Create Midtrans Transaction
            $midtrans = new \Midtrans\Snap();
            $snapResponse = $midtrans->createTransaction($params);
            
            if (!isset($snapResponse->redirect_url)) {
                throw new \Exception('Redirect URL tidak ditemukan dari response Midtrans');
            }

            // Save to database
            $transaction = TransactionDetail::create([
                'user_id' => $userId,
                'invoice_number' => $invoiceFormat,
                'snap_token' => null,
                'amount' => $validatedData['amount'],
                'due_date' => Carbon::now()->addHours(23),
                'invoice_date' => Carbon::now(),
                'receiver' => $validatedData['receiver'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'note' => $validatedData['note'] ?? null,
                'redirect_url' => $snapResponse->redirect_url,
                'status' => 'pending'
            ]);

            // Redirect langsung ke Midtrans
            return redirect()->away($snapResponse->redirect_url);
            
        } catch (\Exception $midtransError) {
            Log::error('Midtrans API Error: ' . $midtransError->getMessage(), [
                'params' => $params,
                'trace' => $midtransError->getTraceAsString()
            ]);
            
            return redirect()->back()->with('error', 'Gagal membuat transaksi pembayaran. Silakan coba lagi.');
        }

    } catch (ValidationException $e) {
        return redirect()->back()->withErrors($e->errors())->withInput();
    } catch (\Exception $e) {
        Log::error('Transaction Creation Error: ' . $e->getMessage());
        return redirect()->back()->with('error', 'Terjadi kesalahan sistem. Silakan coba lagi.');
    }
}

    public function viewOrder($id)
    { 
        $transaction = TransactionDetail::where('invoice_number', $id)->first();
        if (! $transaction) {
            abort(404);
        } else {
            return view("pages.frontend.order.index", compact('transaction'));
        }
    }

    public function callback(Request $request)
    {
        $serverKey = "SB-Mid-server-zzOVDX4CerE9FBw903E57Qxw";
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $transactionStatus = $request->transaction_status;
        $orderId           = $request->order_id;
        $order             = TransactionDetail::where('invoice_number', $orderId)->first();

        if (! $order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        switch ($transactionStatus) {
            case 'capture':
                if ($request->payment_type == 'credit_card') {
                    if ($request->fraud_status == 'challenge') {
                        $order->update(['status' => 'pending']);
                    } else {
                        $order->update(['status' => 'success']);
                    }
                }
                break;
            case 'settlement':
                $order->update(['status' => 'success']);
                break;
            case 'pending':
                $order->update(['status' => 'pending']);
                break;
            case 'deny':
                $order->update(['status' => 'failed']);
                break;
            case 'expire':
                $order->update(['status' => 'expired']);
                break;
            case 'cancel':
                $order->update(['status' => 'canceled']);
                break;
            default:
                $order->update(['status' => 'unknown']);
                break;
        }

        return response()->json(['message' => 'Callback received successfully']);
    }

    public function success(){
        return view('pages.frontend.checkout.success');
    }
}
