<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
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
            } else {
                $group_id = 0;
            }
        
            Permission::create([
                'name' => $permission,
                'status' => '1',
                'user_id' => '1',
                'permission_group_id' => $group_id,
            ]);
        }
        $subadmin = [
            'customer.index', 
            'users.index', 'users.store','users.edit',
            'sports.index',
            'amenities.index', 
            'banners.index', 'banners.store', 'banners.delete',
            'coupons.index', 'coupons.store',
        ];
        
        foreach ($subadmin as $subpermission) {
            if (str_starts_with($subpermission, 'customer.')) {
                $group_id = 1;
            } elseif (str_starts_with($subpermission, 'users.')) {
                $group_id = 2;
            } elseif (str_starts_with($subpermission, 'sports.')) {
                $group_id = 3;
            } elseif (str_starts_with($subpermission, 'amenities.')) {
                $group_id = 4;
            } elseif (str_starts_with($subpermission, 'banners.')) {
                $group_id = 5;
            } elseif (str_starts_with($subpermission, 'coupons.')) {
                $group_id = 6;
            } else {
                $group_id = 0;
            }
        
            Permission::create([
                'name' => $subpermission,
                'status' => '1',
                'user_id' => '2',
                'permission_group_id' => $group_id,
            ]);
        }
        $user = [
            'customer.index', 'customer.store','customer.edit',
            'coupons.index', 'coupons.store',
        ];
        
        foreach ($user as $userpermission) {
            if (str_starts_with($userpermission, 'customer.')) {
                $group_id = 1;
            } elseif (str_starts_with($userpermission, 'users.')) {
                $group_id = 2;
            } elseif (str_starts_with($userpermission, 'sports.')) {
                $group_id = 3;
            } elseif (str_starts_with($userpermission, 'amenities.')) {
                $group_id = 4;
            } elseif (str_starts_with($userpermission, 'banners.')) {
                $group_id = 5;
            } elseif (str_starts_with($userpermission, 'coupons.')) {
                $group_id = 6;
            } else {
                $group_id = 0;
            }
        
            Permission::create([
                'name' => $userpermission,
                'status' => '1',
                'user_id' => '3',
                'permission_group_id' => $group_id,
            ]);
        }
    }
}
