@extends('Layout.main')
@section('content')
    <div class="container">

        <h2>Booking PS</h2>
        <form action="{{ route('booking.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="user_name" class="form-label">Nama:</label>
                <input type="text" id="user_name" name="user_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <input type="text" id="alamat" name="alamat" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="telp" class="form-label">No. Telepon:</label>
                <input type="number" id="telp" name="telp" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="booking_date" class="form-label">Tanggal Booking:</label>
                <input type="date" id="booking_date" name="booking_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="rental_type" class="form-label">Pilih Jenis PS:</label>
                <select id="rental_type" name="rental_type" class="form-control" required>
                    <option value="">-- Pilih PS --</option>
                    <option value="PS4">PS4</option>
                    <option value="PS5">PS5</option>
                </select>
            </div>

            <div class="mb-3" id="timeSelection" style="display: none;">
                <label for="start_time" class="form-label">Pilih Waktu:</label>
                <select id="start_time" name="start_time" class="form-control" required>
                    <option value="">-- Pilih Jam --</option>
                </select>
            </div>

            <label for="qty">Jumlah Unit:</label>
            <input type="number" name="qty" id="qty" class="form-control" min="1" required>

            <button type="submit" class="btn btn-primary mt-4">Booking</button>
        </form>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            let today = new Date();
            let nextWeek = new Date();
            nextWeek.setDate(today.getDate() + 7); 

            let minDate = today.toISOString().split("T")[0];
            let maxDate = nextWeek.toISOString().split("T")[0];

            let dateInput = document.getElementById("booking_date");
            dateInput.setAttribute("min", minDate);
            dateInput.setAttribute("max", maxDate);
        });

        document.getElementById('rental_type').addEventListener('change', updateAvailableTimes);
        document.getElementById('booking_date').addEventListener('change', updateAvailableTimes);

        function updateAvailableTimes() {
            let rentalType = document.getElementById('rental_type').value;
            let bookingDate = document.getElementById('booking_date').value;
            let timeSelection = document.getElementById('timeSelection');
            let timeDropdown = document.getElementById('start_time');

            timeDropdown.innerHTML = '<option value="">-- Pilih Jam --</option>';

            if (rentalType && bookingDate) {
                timeSelection.style.display = 'block';

                fetch(`/get-available-times?rental_type=${rentalType}&booking_date=${bookingDate}`)
                    .then(response => response.json())
                    .then(data => {
                        let filteredTimes = data.filter(time => 
                            time.rental_type === rentalType && time.booking_date === bookingDate
                        );

                        if (filteredTimes.length > 0) {
                            filteredTimes.forEach(time => {
                                let option = document.createElement('option');
                                option.value = time.start_time; // Simpan start_time sebagai value
                                option.setAttribute('data-end-time', time.end_time); // Simpan end_time di atribut
                                option.textContent = `${time.start_time} - ${time.end_time} | Sisa: ${time.available_units}`;
                                timeDropdown.appendChild(option);
                            });
                        } else {
                            let noOption = document.createElement('option');
                            noOption.textContent = "Tidak ada waktu tersedia";
                            noOption.disabled = true;
                            timeDropdown.appendChild(noOption);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                timeSelection.style.display = 'none';
            }
        }

        function getEndTime(startTime) {
            let [hours, minutes] = startTime.split(':');
            let endTime = new Date();
            endTime.setHours(parseInt(hours) + 1, parseInt(minutes));
            return endTime.toTimeString().split(' ')[0].substring(0, 5);
        }
    </script>
@endsection