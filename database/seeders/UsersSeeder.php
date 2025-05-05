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
            'name'           => 'admin',
            'unique_id'     =>uniqid(),
            'email'  => 'admin@mail.com',
            'phone'  => '7845127777',
            'role_id'  => '1',
            'password'  => Hash::make('123456'),
        ]);
    }
}
