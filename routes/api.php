<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\User\BannersController;
use App\Http\Controllers\API\User\CouponsController;
use App\Http\Controllers\API\customer\TurfController;
use App\Http\Controllers\API\User\CustomerController;
use App\Http\Controllers\API\customer\LoginController as CustomerLoginContoller;
use App\Http\Controllers\API\customer\BannerController;
use App\Http\Controllers\API\customer\CouponController;
use App\Http\Controllers\API\customer\VenuesController;
use App\Http\Controllers\API\customer\registerController;
use App\Http\Controllers\API\User\ConfigurationController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// Route::post('admin/login', [UserController::class, 'login']);
// Route::group([
//         'middleware' => 'login',
//     ], function ($router) {

Route::prefix('admin')->group(function () {
    Route::post('/login', [loginController::class, 'login']);
    Route::post('/logout', [loginController::class, 'logout']);

    Route::post('/update', [UserController::class, 'update']);
    Route::post('/list', [UserController::class, 'list']);
    
    Route::prefix('/customer')->controller(CustomerController::class)->group(function () {
        Route::post('/store', 'store');
        Route::post('/list', 'list');
    });
    Route::prefix('/sports')->controller(ConfigurationController::class)->group(function () {
        Route::post('/store', 'SportStore');
        Route::post('/list', 'SportList');
        Route::post('/delete', 'SportsDelete');
    });
    Route::prefix('/amenities')->controller(ConfigurationController::class)->group(function () {
        Route::post('/store', 'AmenitiesStore');
        Route::post('/list', 'AmenitiesList');
        Route::post('/delete', 'AmenitiesDelete');
    });
    Route::prefix('/coupons')->controller(CouponsController::class)->group(function () {
        Route::post('/store', 'store');
        Route::post('/list', 'list');
        Route::post('/delete', 'delete');
    });
    Route::prefix('/banners')->controller(BannersController::class)->group(function () {
        Route::post('/store', 'store');
        Route::post('/list', 'list');
        Route::post('/delete', 'delete');
    });

    // Route::post('/sports/add', [ConfigurationController::class, 'addsports']);
    // Route::post('/sports/list', [ConfigurationController::class, 'sportlist']);
    // Route::post('/sports/delete', [ConfigurationController::class, 'sportdelete']);

    // Route::post('/amenities/add', [ConfigurationController::class, 'addamenities']);
    // Route::post('/amenities/list', [ConfigurationController::class, 'amenitieslist']);
    // Route::post('/amenities/delete', [ConfigurationController::class, 'amenitiesdelete']);

    // Route::post('/coupons/add', [CouponsController::class, 'addcoupons']);
    // Route::post('/coupons/delete', [CouponsController::class, 'deletecoupons']);
    // Route::post('/coupons/list', [CouponsController::class, 'listcoupons']);

    // Route::post('/banner/add', [BannersController::class, 'addbanner']);
    // Route::post('/banner/delete', [BannersController::class, 'bannerdelete']);
    // Route::post('/banner/list', [BannersController::class, 'bannerlist']);
});

// Route::group([
//     'middleware' => 'customer.login',
// ], function () {
Route::prefix('customer')->group(function () {

    Route::post('/register', [RegisterController::class, 'register']);
    Route::post('/profile', [RegisterController::class, 'profile']);

    Route::post('/banner', [BannerController::class, 'banners']);
    Route::post('/coupons', [CouponController::class, 'coupons']);
    Route::post('/venues', [VenuesController::class, 'venues']);

    Route::prefix('/turf')->controller(TurfController::class)->group(function () {
        Route::post('/', 'index');
        Route::post('/details', 'details');
    });

    Route::controller(CustomerLoginContoller::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/otpverify', 'VerifyOtp');
        Route::post('/otpresend', 'ResendOtp');
    });

    Route::middleware('customer.login')->group(function () {
        Route::post('/logout', [CustomerLoginContoller::class, 'logout']);
    });
    
});



