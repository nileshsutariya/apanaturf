<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'unique_id'     =>uniqid(),
            'name'           => 'admin',
            'email'  => 'admin@mail.com',
            'phone'  => '7845127777',
            'password'  => Hash::make('123456'),
            'role_id'  => '1',
            'city_id' => 2,
            'area_id' => 3
        ]);
    }
}
