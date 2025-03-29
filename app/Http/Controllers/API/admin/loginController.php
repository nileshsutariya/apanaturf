<?php

namespace App\Http\Controllers\API\admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\API\BaseController;
use PHPOpenSourceSaver\JWTAuth\Facades\JWTAuth;

class loginController extends BaseController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = auth()->attempt($credentials)) {
            return $this->sendError('Unauthorised.', ['error'=>'Unauthorised']);
        }
        $success= $this->respondWithToken($token);
        // print_r(auth()->user());die;
        return $this->sendResponse($success, 'User login successfully.');
    }
    public function logout(Request $request)
    {
        // print_r(auth()->user());die;
            auth()->logout();
            return $this->sendResponse([], 'Successfully logged out.');
    }

    
    protected function respondWithToken($token)
    {
        return[
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL()
        ];
    }
}
