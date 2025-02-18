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
    public function __construct() {}

    public function create(Request $request)
    {
        try {
            $user = request()->session()->get('user');
            $validatedData = $request->validate([
                'product_id' => 'required|exists:products,id',
                'amount' => 'required|numeric',
                'receiver' => 'required|string',
                'address' => 'required|string',
                'phone_number' => 'required|string',
                'note' => 'nullable|string',
            ]);

            // Midtrans Configuration
            \Midtrans\Config::$serverKey = "SB-Mid-server-zzOVDX4CerE9FBw903E57Qxw";
            \Midtrans\Config::$isProduction = false;
            \Midtrans\Config::$isSanitized = true;
            \Midtrans\Config::$is3ds = true;

            $orderId = "INV-" . time();

            // Tambahkan enabled_payments dengan berbagai metode pembayaran
            $transactionDetails = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $validatedData['amount']
                ],
                'customer_details' => [
                    'first_name' => $validatedData['receiver'],
                    'phone' => $validatedData['phone_number'],
                    'billing_address' => [
                        'address' => $validatedData['address']
                    ]
                ],
                'enabled_payments' => [
                    'credit_card',
                    'mandiri_clickpay',
                    'cimb_clicks',
                    'bca_klikbca',
                    'bca_klikpay',
                    'bri_epay',
                    'echannel',
                    'permata_va',
                    'bca_va',
                    'bni_va',
                    'bri_va',
                    'other_va',
                    'gopay',
                    'indomaret',
                    'alfamart',
                    'danamon_online',
                    'akulaku',
                    'shopeepay',
                    'qris'
                ]
            ];

            try {
                $snapToken = \Midtrans\Snap::createTransaction($transactionDetails);

                if (!isset($snapToken->token)) {
                    throw new \Exception('Snap token tidak ditemukan dari response Midtrans');
                }

                $transaction = TransactionDetail::create([
                    'user_id' => $user->id,
                    'invoice_number' => $orderId,
                    'snap_token' => $snapToken->token,
                    'amount' => $validatedData['amount'],
                    'due_date' => Carbon::now()->addHours(23),
                    'invoice_date' => Carbon::now(),
                    'receiver' => $validatedData['receiver'],
                    'address' => $validatedData['address'],
                    'phone_number' => $validatedData['phone_number'],
                    'note' => $validatedData['note'] ?? null,
                    'redirect_url' => $snapToken->redirect_url,
                    'status' => 'pending'
                ]);

                return redirect()->away($snapToken->redirect_url);
            } catch (\Exception $e) {
                Log::error('Midtrans Error:', ['message' => $e->getMessage()]);
                return redirect()->back()->with('error', 'Gagal membuat transaksi: ' . $e->getMessage());
            }
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors());
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
        Log::info("test");
        $serverKey = "SB-Mid-server-zzOVDX4CerE9FBw903E57Qxw";
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
        
        $transactionStatus = $request->transaction_status;
        $orderId           = $request->order_id;
        $order             = TransactionDetail::where('invoice_number', $orderId)->first();
        
        Log::info($transactionStatus);
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

    public function success()
    {
        return view('pages.frontend.checkout.success');
    }
}
