@extends('Layout.main')

@section('content')
<div class="container">
    <div class="d-flex justify-content-end">
        <a href="/admin" class="btn btn-secondary mb-3">
            Kembali ke Beranda
        </a>
    </div>
    <div class="card">
        <div class="card-body">
            <h4>Detail Order ID: {{ $order->id }}</h4>
            <p><strong>Nama:</strong> {{ $order->user_name }}</p>
            <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
            <p><strong>No. HP:</strong> {{ $order->telp }}</p>
            <p><strong>Rental Type:</strong> {{ $order->rental_type }}</p>
            <p><strong>Jam Pinjam:</strong> {{ date('H:i', strtotime($order->start_time)) }} - {{ date('H:i', strtotime($order->end_time)) }}</p>
            <p><strong>Qty:</strong> {{ $order->qty }}</p>
            <p><strong>Status:</strong> <span class="badge bg-info">{{ $order->status_barang }}</span></p>

            <!-- Tombol Update Status -->
            @if($order->status_barang == 'belum diambil')
                <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status_barang" value="PS Sudah Diambil">
                    <button type="submit" class="btn btn-success w-100">Oke, Pinjamkan PS</button>
                </form>
            @elseif($order->status_barang == 'PS Sudah Diambil')
                <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status_barang" value="PS Sudah Dikembalikan">
                    <button type="submit" class="btn btn-warning w-100">Kembalikan PS</button>
                </form>
            @endif
        </div>
    </div>
</div>
@endsection
