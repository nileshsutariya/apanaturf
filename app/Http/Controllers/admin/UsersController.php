<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\RoleType;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    public function index(Request $request)
    {
        // $users = Auth::user();
        $userQuery = User::leftJoin('role_type', 'users.role_id', '=', 'role_type.id')
            ->leftJoin('city', 'users.city_id', '=', 'city.id')
            ->select('users.*', 'role_type.name as role_name', 'role_type.id as role_id', 'city.id as city_id')
            ->where(function ($q) use ($request) {
                $q->where('users.name', 'like', '%' . $request->search . '%')
                ->orWhere('users.phone', 'like', '%' . $request->search . '%')
                ->orWhere('users.email', 'like', '%' . $request->search . '%')
                ->orWhere('role_type.name', 'like', $request->search . '%');
            });

        if (auth()->user()->role_id == 2) {
            $userQuery->where('users.city_id', auth()->user()->city_id)->where('users.role_id','3');
        }
        
        $user = $userQuery->paginate(10);

        // $users = User::leftJoin('role_type', 'users.role_id', '=', 'role_type.id')
        //     ->select('users.*', 'role_type.name as role_name', 'role_type.id as role_id')
        //     ->where('users.name', 'like', '%' . $request->search . '%')
        //     ->orWhere('users.phone', 'like', '%' . $request->search . '%')
        //     ->orWhere('users.email', 'like', '%' . $request->search . '%')
        //     ->orWhere('role_type.name', 'like', $request->search . '%')->paginate(10);
        $role = RoleType::all();
        if ($request->ajax()) {
            return view('admin.users.users', compact('user', 'role'))->render();
        } else {
            return view('admin.users.users', compact('user', 'role'));
        }

    }
    public function store(Request $request)
    {
        // print_r($request->all());die;
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required',
            'role' => 'required',
            'email' => 'required|email|unique:users,email' . ($request->id ? ','.$request->id : ''),
        ])->validate();
        $users = $request->id ? User::find($request->id) : new User();
        $users->name = $request->name;
        $users->unique_id = uniqid();
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->role_id = $request->role;
        $users->save();
        return redirect()->route('users.index');
    }

}
