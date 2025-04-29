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

Route::post('admin/login', [loginController::class, 'login']);
Route::post('admin/logout', [loginController::class, 'logout']);
// });
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
Route::post('admin/coupons/delete', [CouponsController::class, 'deletecoupons']);
Route::post('admin/coupons/list', [CouponsController::class, 'listcoupons']);

Route::post('admin/banner/add', [BannersController::class, 'addbanner']);
Route::post('admin/banner/delete', [BannersController::class, 'bannerdelete']);
Route::post('admin/banner/list', [BannersController::class, 'bannerlist']);

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

        Route::prefix('/login')->controller(CustomerLoginContoller::class)->group(function () {
            Route::post('/', 'login');
            Route::post('/otpverify', 'otpverify');
            Route::post('/otpresend', 'otpresend');
        });

        Route::middleware('customer.login')->group(function () {
            Route::post('/logout', [CustomerLoginContoller::class, 'logout']);
        });
    });



