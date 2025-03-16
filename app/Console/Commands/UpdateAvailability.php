<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Availability;
use Carbon\Carbon;

class UpdateAvailability extends Command
{
    protected $signature = 'availability:update';
    protected $description = 'Update availability stock for the next 7 days';

    public function handle()
    {
        $today = Carbon::today();
        $nextWeek = $today->copy()->addDays(7);

        for ($date = $today; $date <= $nextWeek; $date->addDay()) {
            foreach (['PS4', 'PS5'] as $rental_type) {
                for ($hour = 10; $hour <= 22; $hour += 2) {
                    Availability::updateOrCreate([
                        'booking_date' => $date->toDateString(),
                        'start_time' => sprintf('%02d:00', $hour),
                        'rental_type' => $rental_type,
                    ], [
                        'available_units' => 5, // Set stok awal
                    ]);
                }
            }
        }

        $this->info('Availability updated for the next 7 days.');
    }
}
