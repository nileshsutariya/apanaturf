<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Customer;
use App\Models\Permission;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Validator;

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

        $permission = Permission::leftJoin('permission_group', 'permission.permission_group_id', '=', 'permission_group.id')
            ->leftJoin('users', 'permission.user_id', '=', 'users.id')
            ->select('permission.*', 'permission_group.name as group_name', 'users.name as user_name')
            ->where('permission.name', 'like', '%' . $request->search . '%')
            ->orWhere('users.name', 'like', '%' . $request->search . '%')
            ->orWhere('permission_group.name', 'like', $request->search . '%')->paginate(10);
            
        if ($request->ajax()) {
            return view('admin.permissions.permission', compact('permission', 'routes'))->render();
        } else {
            return view('admin.permissions.permission', compact('permission', 'routes'));
        }

    }


    public function store(Request $request)
    {
        // print_r($request->routes);die;
        $validator = Validator::make($request->all(), [
            'routes' => $request->id ? 'sometimes' : 'required',
            'group' => 'required',
            'user' => 'required',
        ])->validate();
        $permissions = $request->id ? Permission::find($request->id) : new Permission();
        if ($request->routes != null) {
            $permissions->name = $request->routes;
        }
        $permissions->permission_group_id = $request->group;
        $permissions->user_id = $request->user;
        $permissions->status = ($request->status === 'on') ? 1 : 0;
        $permissions->save();
        return redirect()->route('permission.index');
    }
    public function delete(Request $request)
    {
        // print_r($request->id);die;
        $search = $request->search;
        $permission = Permission::find($request->id);
        $permission->delete();

        return redirect()->route('permission.index', ['search' => $search]);
    }

}
