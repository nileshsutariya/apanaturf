<?php

namespace App\Http\Controllers\admin;

use App\Models\Area;
use App\Models\User;
use App\Models\RoleType;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        $auth = auth()->user();
        $query = User::leftJoin('role_type', 'users.role_id', '=', 'role_type.id')
            ->leftJoin('city', 'users.city_id', '=', 'city.id')
            ->select('users.*', 'role_type.name as role_name', 'role_type.id as role_id', 'city.id as city_id')
            ->where(function ($query) use ($request) {
                $s = $request->search;
                $query->where('users.name', 'like', "%$s%")
                ->orWhere('users.phone', 'like', "%$s%")
                ->orWhere('users.email', 'like', "%$s%")
                ->orWhere('role_type.name', 'like', "$s%");
            });

        if ($auth->role_id == 2) $query->where('users.created_by', $auth->id);
        if ($auth->role_id == 3) $query->where('users.id', $auth->id);

        $user = $query->paginate(10);
        $role = RoleType::all();
        $city = DB::table('city')->get();
        $area = $request->city ? Area::where('city_id', $request->city)->get() : Area::all();

        return $request->ajax()
            ? view('admin.users.users', compact('user', 'role', 'city', 'area'))->render()
            : view('admin.users.users', compact('user', 'role', 'city', 'area'));
    }

    public function store(Request $request)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email' . ($request->id ? ',' . $request->id : ''),
        ])->validate();
        $users = $request->id ? User::find($request->id) : new User();
        $users->name = $request->name;
        $users->unique_id = uniqid();
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->role_id = $request->role;
        $users->city_id = $request->city;
        $users->area_id = $request->area;
        if (!$request->id) {
            $users->created_by = Auth::id();
        }
        $users->save();
        return redirect()->route('users.index');
    }

}
