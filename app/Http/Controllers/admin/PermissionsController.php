<?php

namespace App\Http\Controllers\admin;

use App\Models\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PermissionsController extends Controller
{
    public function index(Request $request)
    {
        $routes = collect(Route::getRoutes())->filter(function ($route) {
            return in_array('web', $route->middleware()) &&
                in_array('check.permission', $route->middleware()) &&
                $route->getName();
        });

        $routes = $routes->pluck('action.as')->all();


       


        $permission = Permission::leftJoin('permissions_group', 'permissions.permission_group_id', '=', 'permissions_group.id')
            ->leftJoin('users', 'permissions.user_id', '=', 'users.id')
            ->select('permissions.*', 'permissions_group.name as group_name', 'users.name as user_name')
            ->where('permissions.name', 'like', '%' . $request->search . '%')
            ->orWhere('users.name', 'like', '%' . $request->search . '%')
            ->orWhere('permissions_group.name', 'like', $request->search . '%')->paginate(10);
        if ($request->ajax()) {
            return view('admin.permissions.permission', compact('permission', 'routes'))->render();
        } else {
            return view('admin.permissions.permission', compact('permission', 'routes'));
        }
    }

}
