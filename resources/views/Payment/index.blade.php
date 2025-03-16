@extends('Layout.main')

@section('content')
    

    <div class="container mt-5">
        <div class="card shadow-lg p-4">
            <h3 class="mb-3 text-center">Detail Pemesanan</h3>
            <center><h5><strong>Order ID:</strong> {{ $booking->id }}</h5>
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
            <h4>Total Bayar: {{ 'Rp ' . number_format($booking->total_price, 0, ',', '.') }}</h4>
            <div class="text-center mt-3">
                <button class="btn btn-warning" id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
    </div>
<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script>
    document.getElementById('pay-button').onclick = function () {
        snap.pay("{{ $snapToken }}", {
            onSuccess: function(result) {
                sendCallback(result);
                let orderId = result.order_id.replace("ORDER-", "");
                window.location.href = "{{ route('payment.success') }}?order_id=" + orderId;
            },
            onPending: function(result) {
                alert("Pembayaran sedang diproses.");
                sendCallback(result);
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
                console.error(result);
            }
        });
    };

    function sendCallback(result) {
        fetch("{{ route('payment.callback') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}"
            },
            body: JSON.stringify(result)
        })
        .then(response => response.json())
        .then(data => console.log("Callback berhasil:", data))
        .catch(error => console.error("Callback gagal:", error));
    }
</script>

@endsection