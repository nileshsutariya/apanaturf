<?php

namespace App\Http\Controllers\API\User;

use App\Models\User;
use App\Models\Images;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\API\BaseController;

class UserController extends BaseController
{
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'nullable|exists:users,id',
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users,email,' . $request->id,
            'phone' => 'required|string|max:10',
            'password' => 'required|string',
            'confirmpassword' => 'required|same:password',
            'role_id' => 'required|exists:role_type,id',
        ]);

        if ($validator->fails()) {
            return $this->senderror(['errors' => $validator->errors()->all()]);
        }

        if ($request->id) {
            $users = User::findOrFail($request->id);
            
            $image_id = $users->profile_image;

            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('admin_image', $filename, 'public');

                $image = Images::create([
                    'image_name' => $filename,
                    'image_path' => $filepath,
                    'reference_name' => 'users',
                    'reference_id' => $users->id, 
                ]);

                $image_id = $image->id; 
            }

            $users->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'profile_image' => $image_id, 
            ]);

            return $this->sendresponse($users, 'User updated successfully');
        } else {
            $image_id = null;
            if ($request->hasFile('profile_image')) {
                $file = $request->file('profile_image');
                $filename = time() . '_' . $file->getClientOriginalName();
                $filepath = $file->storeAs('admin_image', $filename, 'public');

                $image = Images::create([
                    'image_name' => $filename,
                    'image_path' => $filepath,
                    'reference_name' => 'users',
                    'reference_id' => 0, 
                ]);

                $image_id = $image->id;
            }

            $users = User::create([
                'unique_id' => uniqid(),
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
                'role_id' => $request->role_id,
                'profile_image' => $image_id, 
            ]);

            if ($image_id) {
                $image->update(['reference_id' => $users->id]);
            }

            return $this->sendresponse($users, 'User registered successfully');
        }
    }

    public function list(Request $request) 
    {
        $query = User::query();

        $validator = Validator::make($request->all(), [
            'filter_param.id' => 'nullable|exists:users,id',
            'order.column' => 'nullable|string|in:name,email,phone,id',
            'order.dir' => 'nullable|string|in:asc,desc', 
        ]);
        if($validator->fails()){
            return $this->senderror( ['errors' => $validator->errors()->all()]);
        }

        if ($request->has('filter_param.id') && !empty($request->input('filter_param.id'))) {
            $query->where('id', $request->input('filter_param.id'));
        }

        if (!empty($request->input('search.value'))) {
            $searchValue = $request->input('search.value');
            $query->where(function($q) use ($searchValue) {
                $q->where('name', 'LIKE', "%{$searchValue}%")
                ->orWhere('email', 'LIKE', "%{$searchValue}%")
                ->orWhere('phone', 'LIKE', "%{$searchValue}%");
            });
        }

        $sortColumn = $request->input('order.column', 'id'); 
        $sortDirection = $request->input('order.dir', 'asc'); 
    
        $query->orderBy($sortColumn, $sortDirection);
    
        $users = $query->offset($request->start*$request->length)->limit($request->length)->get();

        return $this->sendresponse($users, 'Users List');
    }

}
