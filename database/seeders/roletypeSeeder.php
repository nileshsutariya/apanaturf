<?php

namespace Database\Seeders;

use App\Models\Role_type;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roletypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'subadmin', 'user', 'customer', 'vendor'];

        foreach ($roles as $role) {
            Role_type::create([
                'name' => $role,
                'code' => rand(1000, 9999),
            ]);
        }
    }
}
