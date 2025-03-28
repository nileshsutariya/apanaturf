<?php

use App\Http\Controllers\API\User\CustomerController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\customer\registerController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('admin/login', [loginController::class, 'login']);
    Route::post('admin/logout', [loginController::class, 'logout']);
});