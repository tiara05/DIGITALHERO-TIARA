<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        \App\Models\Booking::create([
            'user_name' => 'Tiara',
            'booking_date' => now(),
            'rental_type' => 'PS5',
            'total_price' => 40000,
            'payment_status' => 'pending',
        ]);
    }

}
