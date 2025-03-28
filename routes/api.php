<?php

use App\Http\Controllers\API\User\CustomerController;
use App\Http\Controllers\API\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\customer\registerController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// Route::post('admin/login', [UserController::class, 'login']);

Route::post('admin/update', [UserController::class, 'update']);
Route::post('admin/list', [UserController::class, 'list']);
Route::post('admin/customer/update', [CustomerController::class, 'customerupdate']);
Route::post('admin/customer/list', [CustomerController::class, 'customerlist']);

Route::group([
    'middleware' => 'login',
], function ($router) {

    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('admin/login', [loginController::class, 'login']);
    Route::post('admin/logout', [loginController::class, 'logout']);
});