<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('city')->truncate();

        $cities = ['Surat','Mumbai','Pune','Rajkot','Ahemdabad'];

        foreach ($cities as $city) {
            DB::table('city')->insert([
                'city_name' => $city,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
