<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AvailabilitySeeder extends Seeder
{
    public function run()
    {
        // Hapus data lama (opsional, hanya jika ingin reset total)
        DB::table('availabilities')->where('booking_date', '<', Carbon::today())->delete();

        // Jenis rental
        $rental_types = ['PS4', 'PS5'];

        // Jam operasional yang tersedia (misalnya: 10:00 - 18:00 setiap 1 jam)
        $time_slots = ['10:00:00', '11:00:00', '12:00:00', '13:00:00', '14:00:00', '15:00:00', '16:00:00', '17:00:00'];

        // Tambah stok untuk 7 hari ke depan
        for ($i = 1; $i <= 7; $i++) {
            $date = Carbon::today()->addDays($i - 1)->toDateString(); // Hari ini + 1 minggu ke depan

            foreach ($time_slots as $start_time) {
                // Hitung end_time (start_time + 1 jam)
                $end_time = Carbon::parse($start_time)->addHour()->format('H:i:s');

                foreach ($rental_types as $type) {
                    DB::table('availabilities')->insert([
                        'booking_date' => $date,
                        'start_time' => $start_time,
                        'end_time' => $end_time, // Menambahkan end_time
                        'rental_type' => $type,
                        'available_units' => 5, // Default stok per sesi
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }
    }
}
