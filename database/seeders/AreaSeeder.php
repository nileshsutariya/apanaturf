<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $areas = ['Mota Varchha', 'Utran', 'Nana Varachha'];

        foreach ($areas as $area) {
            DB::table('area')->insert([
                'city_id' => 1,
                'area' => $area,
                'pincode' => '365004'
            ]);
        }
    }
}
