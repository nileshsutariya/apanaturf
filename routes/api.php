<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\customer\registerController;

Route::group([
    'middleware' => 'login',
], function ($router) {

    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('customer/register', [registerController::class, 'register']);
    Route::post('admin/login', [loginController::class, 'login']);
    Route::post('admin/logout', [loginController::class, 'logout']);
});