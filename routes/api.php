<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\User\UserController;
use App\Http\Controllers\API\admin\loginController;
use App\Http\Controllers\API\User\BannersController;
use App\Http\Controllers\API\User\CouponsController;
use App\Http\Controllers\API\customer\TurfController;
use App\Http\Controllers\API\User\CustomerController;
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



Route::post('customer/register', [registerController::class, 'register']);
Route::post('customer/profile', [registerController::class, 'profile']);

Route::post('customer/login', [\App\Http\Controllers\API\customer\LoginController::class, 'login']);

Route::post('customer/otp/verify', [\App\Http\Controllers\API\customer\LoginController::class, 'verifyotp']);
Route::post('customer/otp/resend', [\App\Http\Controllers\API\customer\LoginController::class, 'resendotp']);

// Route::group([
//     'middleware' => 'customer.login',
// ], function () {

Route::middleware('customer.login')->group(function () {

    Route::post('customer/logout', [\App\Http\Controllers\API\customer\LoginController::class, 'logout']);
   
});

Route::post('customer/banner', [BannerController::class, 'banners']);
// Route::post('customer/banner/store', [BannerController::class, 'storebanners']);

Route::post('customer/turf', [TurfController::class, 'turf']);
Route::post('customer/turf/details', [TurfController::class, 'details']);

Route::post('customer/coupons', [CouponController::class, 'coupons']);

Route::post('customer/venues', [VenuesController::class, 'venues']);

