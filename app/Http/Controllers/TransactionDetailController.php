<?php
namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Midtrans\Config;
use Midtrans\Snap;

class TransactionDetailController extends Controller
{
    public function __construct()
    {
    }
    
    public function create(Request $request)
    {
        \Midtrans\Config::$serverKey    = "SB-Mid-server-zzOVDX4CerE9FBw903E57Qxw";
        \Midtrans\Config::$clientKey    = "SB-Mid-client-AcN39HdcG6CVof4m";
        \Midtrans\Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        \Midtrans\Config::$isSanitized  = env('MIDTRANS_IS_SANITIZED', true);
        \Midtrans\Config::$is3ds        = env('MIDTRANS_IS_3DS', true);

        $userId    = "1";              // Ambil user yang sedang login
        $userEmail = "axel@gmail.com"; // Ambil user yang sedang login
        if (! $userId) {
            return response()->json(['error' => 'Anda harus login terlebih dahulu!'], 401);
        }

        $invoiceFormat = "INV-" . date('ymd') . "-" . strtoupper(str()->random(5));
        $invoicedate   = Carbon::now();

        try {
            $duedate       = Carbon::now()->addHours(23);
            $validatedData = $request->validate([
                'amount'       => 'required|numeric',
                'receiver'     => 'required|string',
                'address'      => 'required|string',
                'phone_number' => 'required|string',
                'note'         => 'nullable|string',
            ]);

            $params = [
                'transaction_details' => [
                    'order_id'     => $invoiceFormat,
                    'gross_amount' => $validatedData['amount'],
                ],
                'customer_details'    => [
                    'first_name' => $validatedData['receiver'],
                    'email'      => $userEmail,
                    'phone'      => $validatedData['phone_number'],
                ],
            ];

            // Coba ambil Snap Token dari Midtrans
            try {
                $snapToken   = Snap::getSnapToken($params);
                $redirectUrl = "https://app.sandbox.midtrans.com/snap/v2/vtweb/" . $snapToken;
            } catch (\Exception $midtransError) {
                Log::error('Midtrans API Error: ' . $midtransError->getMessage(), [
                    'params' => $params,
                    'trace'  => $midtransError->getTraceAsString(),
                ]);

                return response()->json([
                    'status'  => 'error',
                    'message' => 'Gagal mendapatkan Snap Token dari Midtrans!',
                    'error'   => $midtransError->getMessage(),
                ], 500);
            }

            // Simpan transaksi ke database
            $transaction = TransactionDetail::create([
                'user_id'        => $userId,
                'invoice_number' => $invoiceFormat,
                'snap_token'     => $snapToken,
                'amount'         => $validatedData['amount'],
                'due_date'       => $duedate,
                'invoice_date'   => $invoicedate,
                'receiver'       => $validatedData['receiver'],
                'address'        => $validatedData['address'],
                'phone_number'   => $validatedData['phone_number'],
                'note'           => $validatedData['note'] ?? null,
                'redirect_url'   => $redirectUrl,
                'status'         => 'pending',
            ]);
            
            return redirect()->route('page.order', ['id' => $invoiceFormat]);

        } catch (ValidationException $e) {
            return response()->json([
                'status' => 'error',
                'errors' => $e->validator->errors(),
            ], 422);
        } catch (\Exception $e) {

            return response()->json([
                'status'  => 'error',
                'message' => 'Terjadi kesalahan saat membuat transaksi. Silakan coba lagi!',
                'error-1' => $e->getMessage(),
                'error-2' => $e->getTraceAsString(),
            ], 500);
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
        $serverKey = env('MIDTRANS_SERVER_KEY');
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
}
