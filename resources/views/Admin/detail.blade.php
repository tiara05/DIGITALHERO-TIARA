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
                <button type="submit" class="btn btn-success w-100" data-bs-toggle="modal" data-bs-target="#rentalModal">Oke, Pinjamkan PS</button>
            @elseif($order->status_barang == 'PS Sudah Diambil')
                <p><strong>Kode Slot PS:</strong> {{ $order->kode_ps }}</p>
                <form action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status_barang" value="PS Sudah Dikembalikan">
                    <button type="submit" class="btn btn-warning w-100">Kembalikan PS</button>
                </form>
            @endif
        </div>
    </div>
</div>

<!-- Modal Pilih Slot PS -->
<div class="modal fade" id="rentalModal" tabindex="-1" aria-labelledby="rentalModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rentalModalLabel">Pilih Slot PS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="rentalForm" action="{{ route('admin.order.update', $order->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="status_barang" value="PS Sudah Diambil">

                    <!-- Dropdown Slot PS -->
                    <div class="mb-3">
                        <label for="kode_ps" class="form-label">Pilih Slot PS</label>
                        <select class="form-select" name="kode_ps" id="kode_ps" required >
                            <option value="">Pilih Slot PS</option>
                            @foreach($availableSlots as $slot)
                                <option value="{{ $slot->id }}" style="color: black;">{{ $slot->slot }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success w-100">Konfirmasi Peminjaman</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
