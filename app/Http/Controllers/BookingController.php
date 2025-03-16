<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Availability;
use Carbon\Carbon;
use Illuminate\Support\Str;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class BookingController extends Controller
{
    public function index()
    {
        // Ambil daftar sesi yang tersedia tanpa duplikasi
        $available_sessions = Availability::where('available_units', '>', 0)
            ->select('booking_date', 'start_time', 'rental_type', 'available_units')
            ->distinct()
            ->orderBy('booking_date')
            ->orderBy('start_time')
            ->get();
        
        return view('booking.index', compact('available_sessions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'booking_date' => 'required|date|after_or_equal:today|before_or_equal:' . now()->addDays(7)->toDateString(),
            'start_time' => 'required|date_format:H:i:i',
            'rental_type' => 'required|in:PS4,PS5',
            'qty' => 'required|integer|min:1',
        ]);

        // Cek ketersediaan alat
        $availability = Availability::where('booking_date', $validated['booking_date'])
            ->where('start_time', $validated['start_time'])
            ->where('rental_type', $validated['rental_type'])
            ->first();
        
        if (!$availability || $availability->available_units < $validated['qty']) {
            return back()->withErrors(['error' => 'Sesi ini sudah penuh atau stok tidak mencukupi.']);
        }

        $end_time = Carbon::createFromFormat('H:i:i', $validated['start_time'])->addHour()->format('H:i:i');
        // Harga dasar berdasarkan jenis rental
        $base_price = $validated['rental_type'] == 'PS4' ? 30000 : 40000;

        // Biaya tambahan akhir pekan
        $weekend_surcharge = in_array(date('l', strtotime($validated['booking_date'])), ['Saturday', 'Sunday']) ? 50000 : 0;

        // Total harga berdasarkan qty
        $total_price = ($base_price + $weekend_surcharge) * $validated['qty'];

        // Kurangi jumlah alat yang tersedia
        $availability->available_units -= $validated['qty'];
        $availability->save();

        // Simpan booking
        $booking = Booking::create([
            // 'id' => $orderId,
            'user_name' => $validated['user_name'],
            'alamat' => $validated['alamat'],
            'telp' => $validated['telp'],
            'booking_date' => $validated['booking_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $end_time,
            'rental_type' => $validated['rental_type'],
            'qty' => $validated['qty'],
            'total_price' => $total_price,
            'payment_status' => 'pending',
            'status_barang' => 'Belum Diambil'
        ]);
        return redirect()->route('pay', ['bookingId' => $booking->id]);
    }

    public function getAvailableTimes(Request $request)
    {
        $validated = $request->validate([
            'rental_type' => 'required|in:PS4,PS5',
            'booking_date' => 'required|date',
        ]);

        // Ambil daftar waktu yang tersedia beserta stoknya
        $available_sessions = Availability::whereBetween('booking_date', [now()->toDateString(), now()->addDays(7)->toDateString()])
            ->where('available_units', '>', 0)
            ->orderBy('booking_date')
            ->orderBy('start_time')
            ->get();


        return response()->json($available_sessions);
    }

    public function updateStatus($orderId, $status)
    {
        $orderId = str_replace('ORDER-', '', $orderId);

        // Cari booking berdasarkan orderId
        $booking = Booking::where('id', $orderId)->first();

        if (!$booking) {
            return redirect('/')->with('error', 'Order tidak ditemukan.');
        }

        // status berdasarkan parameter
        if ($status == 'diambil') {
            $booking->update(['status_barang' => 'sudah diambil']);
        } elseif ($status == 'dikembalikan') {
            $booking->update(['status_barang' => 'sudah dikembalikan']);
        }

        return redirect('/')->with('success', 'Status barang berhasil diperbarui.');
    }

    public function downloadPDF($orderId)
    {
        $booking = Booking::findOrFail($orderId);

        $pdf = Pdf::loadView('payment.invoice', compact('booking'));

        return $pdf->download('invoice_' . $orderId . '.pdf');
    }
    

}
