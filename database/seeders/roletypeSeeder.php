<?php

namespace Database\Seeders;

use App\Models\RoleType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['Admin', 'Sub admin', 'User', 'Customer', 'Vendor'];

        foreach ($roles as $role) {
            RoleType::create([
                'name' => $role,
                'code' => rand(1000, 9999),
            ]);
        }
    }
}
