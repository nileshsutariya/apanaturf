<?php

namespace Database\Seeders;

use App\Models\TurfTiming;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TurfTimingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TurfTiming::create([
            'turf_id'           => '1',
            'from'     => '09:00:00',
            'to'  => '23:00:00',
        ]);
    }
}
