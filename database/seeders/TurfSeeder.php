<?php

namespace Database\Seeders;

use App\Models\Turf;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TurfSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imageIds = DB::table('images')->pluck('id')->take(4)->toArray();

        for ($i = 1; $i <= 4; $i++) {
            DB::table('turf')->insert([
                'name' => "Turf $i",
                'sports_ids' => json_encode([1, 2]), // example
                'amenities_ids' => json_encode([1, 3]), // example
                'location_link' => 'https://maps.example.com/turf' . $i,
                'location_text' => 'Location ' . $i,
                'feature_image' => $imageIds[$i - 1], // One image as feature
                'turf_image' => json_encode($imageIds), // All 4 images as turf images
                'height' => 10.0,
                'width' => 20.0,
                'length' => 30.0,
                'sessions' => json_encode(['30min', '1hrs','2hrs']),
                'booking_price' => 1200.00,
                'unit' => "Day",
                'description' => 'Turf description for Turf ' . $i,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
