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
        $group = $request->group;

        $routes = collect(Route::getRoutes())->filter(function ($route) use ($group) {
            $hasRequiredMiddleware = in_array('web', $route->middleware()) &&
                in_array('check.permission', $route->middleware()) &&
                $route->getName();

            if (!$hasRequiredMiddleware) {
                return false;
            }
            return $group ? Str::startsWith($route->getName(), $group) : true;
        });

        $routes = $routes->pluck('action.as')->all();
        $permission = Permission::leftJoin('permissions_group', 'permissions.permission_group_id', '=', 'permissions_group.id')
            ->leftJoin('users', 'permissions.user_id', '=', 'users.id')
            ->select('permissions.*', 'permissions_group.name as group_name', 'users.name as user_name')
            ->where('users.role_id', '!=', 1)
            ->where(function ($query) use ($request) {
                $query->where('permissions.name', 'like', '%' . $request->search . '%')
                    ->orWhere('users.name', 'like', '%' . $request->search . '%')
                    ->orWhere('permissions_group.name', 'like', $request->search . '%');
            })->paginate(10);
        $users = User::all();
        $group = PermissionGroup::all();
        if ($request->ajax()) {
            return view('admin.permissions.permission', compact('permission', 'routes', 'users', 'group'))->render();
        } else {
            return view('admin.permissions.permission', compact('permission', 'routes', 'users', 'group'));
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
