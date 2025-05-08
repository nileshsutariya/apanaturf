<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $route = ['customer', 'users', 'sports', 'amenities','banners', 'coupons','area','permission','permissiongroup'];
        foreach ($route as $permission) {
            PermissionGroup::create([
                'name' => $permission,
                'status' => '1',
            ]);
        }
    }
}
