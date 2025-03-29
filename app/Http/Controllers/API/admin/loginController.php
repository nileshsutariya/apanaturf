<?php

namespace App\Http\Controllers\API\admin;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $credentials = request(['email', 'password']);
  
        if (!$token = Auth::attempt($credentials)) {
            return $this->apierror('Unauthorised.', ['error'=>'Unauthorised']);
        }
  
        $success = $this->respondWithToken($token);
   
        return $this->apisuccess($success, 'User login successfully.');
    
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return $this->apisuccess([], 'Successfully logged out.');
        
    }
    
    protected function respondWithToken($token)
    {
        return [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ];
    }
}
