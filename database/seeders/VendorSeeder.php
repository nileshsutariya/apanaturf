<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('venues')->insert([
            [
                'vendor_id' => Str::random(10),
                'owner_name' => 'Vendor',
                'owner_email' => 'vendor@gmail.com',
                'owner_phone' => '1234567890',
                'password' => bcrypt('123456'),
                'password_update' => Carbon::now(),
                'otp' => rand(1000, 9999),
                'otp_send_at' => Carbon::now(),
                'otp_verified_at' => Carbon::now(),
                // 'city_id' => 2,
                // 'area_id' => 5,
                'pincode' => '395105',
                'location_link' => 'https://maps.google.com/?q=Some+location',
                'location_text' => 'Some location description',
                // 'pancard' => 1, 
                // 'Aadhaar_card' => 1,
                // 'vendor_image' => 1,
                'created_by' => 1,
                'status' => 2, 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ]);
    }
}
