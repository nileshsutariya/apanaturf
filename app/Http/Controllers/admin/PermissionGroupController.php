<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PermissionGroupController extends Controller
{
    public function index()
    {
        $permission = PermissionGroup::paginate(10);
        return view('admin.permissions.permission_group', compact('permission'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required'
        ])->validate();

        $permission = $request->id ? PermissionGroup::find($request->id) : new PermissionGroup();
        $permission->name = $request->name;
        $permission->save();
        return redirect()->route('permission.index');
    }
}
