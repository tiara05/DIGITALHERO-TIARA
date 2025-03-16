@extends('Layout.main')

@section('content')
    <center><h1>Pembayaran Berhasil!</h1></center>
    
    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="mb-3 text-center">Detail Pemesanan</h3>
            <center><h5><strong>Order ID:</strong> {{ $orderId }}</h5>
            <table class="table table-borderless ">
                <tr>
                    <th style="width: 3%;">Nama:</th>
                    <td>{{ $booking->user_name }}</td>
                    <th style="width: 10%;">Rental Type:</th>
                    <td>{{ $booking->rental_type }}</td>
                </tr>
                <tr>
                    <th>Alamat:</th>
                    <td>{{ $booking->alamat }}</td>
                    <th>Jam Pinjam:</th>
                    <td>{{ date('H:i', strtotime($booking->start_time)) }} - {{ date('H:i', strtotime($booking->end_time)) }}</td>
                </tr>
                <tr>
                    <th>No. HP:</th>
                    <td>{{ $booking->telp }}</td>
                    <th>Qty:</th>
                    <td>{{ $booking->qty }}</td>
                </tr>
            </table>
            <div class="text-center mt-3">
                <a href="{{ url('/download-pdf/' . $orderId) }}" class="btn btn-primary">
                    Download Invoice PDF
                </a>
                <a href="/" class="btn btn-secondary">
                    Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>
@endsection
