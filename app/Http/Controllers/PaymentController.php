<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Transaction;
use Illuminate\Support\Facades\Log;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
    }

    public function pay($bookingId)
    {
        $booking = Booking::where('id', $bookingId)->firstOrFail();

        $params = [
            'transaction_details' => [
                'order_id' => 'ORDER-' . $booking->id,
                'gross_amount' => $booking->total_price,
            ],
            'item_details' => [
                [
                    'id' => 'ps_rental',
                    'price' => 30000,
                    'quantity' => 1,
                    'name' => "Rental PS" // Ubah dari "NelayanKu" ke nama bisnismu
                ]
            ],
            'customer_details' => [
                'first_name' => $booking->user_name,
            ],
        ];

        $snapToken = Snap::getSnapToken($params);
        return view('payment.index', compact('snapToken', 'booking'));
    }

    public function callback(Request $request)
    {
        Log::info('Midtrans Callback: ', $request->all());

        try {
            $orderId = str_replace('ORDER-', '', $request->order_id ?? $request->input('transaction_id'));
            $transactionStatus = $request->transaction_status;
            $statusCode = $request->status_code;

            // Cek apakah order ID valid
            $booking = Booking::where('id', str_replace('ORDER-', '', $orderId))->first();
            if (!$booking) {
                Log::error('Order not found: ' . $orderId);
                return response()->json(['status' => 'error', 'message' => 'Order not found'], 404);
            }

            // Cek status pembayaran
            if (in_array($transactionStatus, ['capture', 'settlement'])) {
                $booking->update(['payment_status' => 'paid']);
                return redirect()->route('payment.success');
            } elseif ($transactionStatus == 'pending') {
                $booking->update(['payment_status' => 'pending']);
            } elseif (in_array($transactionStatus, ['deny', 'cancel', 'expire'])) {
                $booking->update(['payment_status' => 'failed']);
            }

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {
            Log::error('Callback Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => 'Callback processing failed'], 500);
        }
    }

    public function success(Request $request)
    {
        Log::info('Midtrans Success: ', $request->all());

        $orderId = str_replace('ORDER-', '', $request->query('order_id')); // Menghapus "ORDER-"
        $statusCode = $request->query('status_code');
        $transactionStatus = $request->query('transaction_status');

        // Cari data booking berdasarkan ID
        $booking = Booking::where('id', $orderId)->first();

        return view('payment.success', compact('orderId', 'booking'));
    }

}
