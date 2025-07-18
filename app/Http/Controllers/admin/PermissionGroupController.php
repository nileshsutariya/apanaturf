<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Models\PermissionGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class PermissionGroupController extends Controller
{
    public function index()
    {
        $permissiongroup = PermissionGroup::paginate(10);
        return view('admin.permissions.permission_group', compact('permissiongroup'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|alpha'
        ])->validate();

        $permissiongroup = $request->id ? PermissionGroup::find($request->id) : new PermissionGroup();
        $permissiongroup->name = $request->name;
        $permissiongroup->status = $request->has('status') ? 1 : 0;

        $permissiongroup->save();
        
        return redirect()->back()->with('success', 'Permission Group Created Successfully!');
    }
    public function delete(Request $request)
    {
        $id = $request->id;
        if (!$id) {
            return response()->json(['error' => 'ID is required.'], 400);
        }
        $permissionGroup = PermissionGroup::find($id);

        if (!$permissionGroup) {
            return response()->json(['error' => 'Permission group not found.'], 404);
        }

        DB::table('permission')->where('permission_group_id', $permissionGroup->id)->delete();
        // print_r("vfcdxsza"); die;
        $permissionGroup->delete();

        return response()->json(['success' => true]);
    }

}
