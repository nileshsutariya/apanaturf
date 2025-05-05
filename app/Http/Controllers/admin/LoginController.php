<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        if(Auth::check()){ 
            return redirect()->route('admin.dashboard');
        }else{
            return view('admin.login');
        }
    }

    public function logincheck(Request $request)
    {
        // Validate the form input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
    
        // Get credentials
        $credentials = $request->only('email', 'password');
        // Attempt login
        if (Auth::attempt($credentials)) {
                return redirect()->route('admin.dashboard');
        }
    
        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('admin.login');

    }

    public function dashboard(){
            return view('admin.dashboard');
    }
}
