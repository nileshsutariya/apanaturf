<?php

namespace Database\Seeders;

use App\Models\Turf;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Turf::create([
            'name'           => ' Hare Krishna',
            'sports_ids'     => json_encode([1]),
            'amenities_ids'  => json_encode([1]),
            'location_link'  => 'https://maps.app.goo.gl/LTh4tGYew8vY9W2b8',
            'location_text'  => 'surat gujarat',
            'turf_image'     => '',
            'height'         => null,
            'width'          => '800',
            'length'         => '800',
            'sessions'       => json_encode([30]),
            'booking_price'  => '500.00',
            'unit'           => null,
            'description'    => 'abc',
        ]);
    }
}
