<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice Order {{ $booking->id }}</title>
    <style>
        body { font-family: Arial, sans-serif; }
        h1 { text-align: center; }
        .details { margin-top: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid black; padding: 8px; text-align: left; }
    </style>
</head>
<body>
    <h1>Invoice Pembayaran</h1>
    <p><strong>Order ID:</strong> {{ $booking->id }}</p>
    
    <h3>Detail Pemesanan</h3>
    <table>
        <tr>
            <th>Nama</th>
            <td>{{ $booking->user_name }}</td>
        </tr>
        <tr>
            <th>Alamat</th>
            <td>{{ $booking->alamat }}</td>
        </tr>
        <tr>
            <th>No. HP</th>
            <td>{{ $booking->telp }}</td>
        </tr>
        <tr>
            <th>Rental Type</th>
            <td>{{ $booking->rental_type }}</td>
        </tr>
        <tr>
            <th>Jam Pinjam</th>
            <td>{{ $booking->start_time }} - {{ $booking->end_time }}</td>
        </tr>
        <tr>
            <th>Qty</th>
            <td>{{ $booking->qty }}</td>
        </tr>
        <tr>
            <th>Status Pembayaran</th>
            <td>{{ $booking->payment_status }}</td>
        </tr>

    </table>

    <p style="text-align:center; margin-top: 30px;">Terima kasih telah menggunakan layanan kami!</p>
</body>
</html>
