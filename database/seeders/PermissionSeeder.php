<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // DB::table('permission')->truncate(); 

        $admin = [
            'customer.index', 'customer.store','customer.edit',
            'users.index', 'users.store','users.edit',
            'sports.index', 'sports.store', 'sports.delete',
            'amenities.index', 'amenities.store', 'amenities.delete',
            'banners.index', 'banners.store', 'banners.delete',
            'coupons.index', 'coupons.store','coupons.edit',
            'area.index', 'area.store','area.edit',
            'permission.index', 'permission.store','permission.edit',
            'permissiongroup.index', 'permissiongroup.store','permissiongroup.edit',
            'vendor.index', 'vendor.store','vendor.edit',
            'city.index', 'city.store','city.edit',
        ];
        
        foreach ($admin as $permission) {
            if (str_starts_with($permission, 'customer.')) {
                $group_id = 1;
            } elseif (str_starts_with($permission, 'users.')) {
                $group_id = 2;
            } elseif (str_starts_with($permission, 'sports.')) {
                $group_id = 3;
            } elseif (str_starts_with($permission, 'amenities.')) {
                $group_id = 4;
            } elseif (str_starts_with($permission, 'banners.')) {
                $group_id = 5;
            } elseif (str_starts_with($permission, 'coupons.')) {
                $group_id = 6;
            } elseif (str_starts_with($permission, 'area.')) {
                $group_id = 7;
            } elseif (str_starts_with($permission, 'permission.')) {
                $group_id = 8;
            } elseif (str_starts_with($permission, 'permissiongroup.')) {
                $group_id = 9;
            } elseif (str_starts_with($permission, 'vendor.')) {
                $group_id = 10;
            } elseif (str_starts_with($permission, 'city.')) {
                $group_id = 11;
            } else {
                $group_id = 1;
            }
        
            Permission::create([
                'name' => $permission,
                'status' => '1',
                'user_id' => '1',
                'permission_group_id' => $group_id,
            ]);
        }
    }
}
