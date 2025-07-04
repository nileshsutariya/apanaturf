<?php

namespace Database\Seeders;

use App\Models\PermissionGroup;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionGroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        DB::table('permission_group')->truncate(); 

        $route = [
            'customer', 
            'users', 
            'sports', 
            'amenities',
            'banners', 
            'coupons',
            'area',
            'permission',
            'permissiongroup', 
            'vendor',
            'city'];
        
        foreach ($route as $permission) {
            PermissionGroup::create([
                'name' => $permission,
                'status' => '1',
            ]);
        }
    }
}
