<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\User\CouponsController;
use App\Http\Controllers\API\User\CustomerController;
use App\Http\Controllers\API\customer\registerController;
use App\Http\Controllers\API\User\ConfigurationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// Route::post('admin/login', [UserController::class, 'login']);

Route::post('admin/update', [UserController::class, 'update']);
Route::post('admin/list', [UserController::class, 'list']);
Route::post('admin/customer/update', [CustomerController::class, 'customerupdate']);
Route::post('admin/customer/list', [CustomerController::class, 'customerlist']);

Route::post('admin/sports/add', [ConfigurationController::class, 'addsports']);
Route::post('admin/sports/list', [ConfigurationController::class, 'sportlist']);
Route::post('admin/sports/delete', [ConfigurationController::class, 'sportdelete']);

Route::post('admin/amenities/add', [ConfigurationController::class, 'addamenities']);
Route::post('admin/amenities/list', [ConfigurationController::class, 'amenitieslist']);
Route::post('admin/amenities/delete', [ConfigurationController::class, 'amenitiesdelete']);

Route::post('admin/coupons/add', [CouponsController::class, 'addcoupons']);

Route::group([
        'middleware' => 'login',
    ], function ($router) {

    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('admin/login', [loginController::class, 'login']);
    Route::post('admin/logout', [loginController::class, 'logout']);
});