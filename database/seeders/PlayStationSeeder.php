<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlayStation;

class PlayStationSeeder extends Seeder
{
    public function run(): void
    {
        $psTypes = ['PS4', 'PS5'];

        foreach ($psTypes as $type) {
            for ($i = 1; $i <= 5; $i++) { // 5 slot per jenis PS
                PlayStation::create([
                    'jenis' => $type,
                    'slot' =>  $type . '-' . $i,
                    'status' => 'tersedia',
                ]);
            }
        }
    }
}

