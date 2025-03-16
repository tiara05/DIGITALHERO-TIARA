@extends('Layout.main')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Dashboard Admin</h2>
        <a href="/admin/logout" class="btn btn-secondary">
            Logout
        </a>
    </div>
   
    <!-- Form Pencarian -->
    <form action="{{ route('admin.search') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="order_id" class="form-control" placeholder="Cari Order ID..." required>
            <button type="submit" class="btn btn-primary">Cari</button>
        </div>
    </form>

    <!-- Tabel Hasil Pencarian -->
    @if(isset($orders))
        <h4>Hasil Pencarian</h4>
        <div class="row">
            @foreach ($orders as $order)
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Order ID: {{ $order->id }}</h5>
                        <p><strong>Nama:</strong> {{ $order->user_name }}</p>
                        <p><strong>Alamat:</strong> {{ $order->alamat }}</p>
                        <p><strong>Qty:</strong> {{ $order->qty }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-info">{{ $order->status_barang }}</span></p>
                        <a href="{{ route('admin.order.show', $order->id) }}" class="btn btn-primary w-100">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
