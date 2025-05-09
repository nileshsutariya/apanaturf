<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\loginController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SportsController;
use App\Http\Controllers\admin\CouponsController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\admin\AmenitiesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\admin\PermissionGroupController;



Route::prefix('admin')->group(function () {
    // Route::post('admin/permissiongroup/delete', [PermissionGroupController::class, 'delete'])->name('permissiongroup.delete');

    Route::get('/login', [loginController::class, 'login'])->name('admin.login');
    Route::post('/login', [loginController::class, 'logincheck'])->name('logincheck');

    Route::middleware('admin.login')->group(function () {

        Route::get('/unauthorized', [loginController::class, 'unauthorized'])->name('unauthorized');
        Route::get('/dashboard', [loginController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [loginController::class, 'logout'])->name('logout');
        Route::middleware('check.permission')->group(function () {

            Route::prefix('/customer')->controller(CustomerController::class)->name('customer.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/permission')->controller(PermissionsController::class)->name('permission.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/delete', 'delete')->name('delete');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });
            Route::prefix('/area')->controller(AreaController::class)->name('area.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });
            Route::prefix('/permissiongroup')->controller(PermissionGroupController::class)->name('permissiongroup.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });

            Route::prefix('/users')->controller(UsersController::class)->name('users.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });

            Route::prefix('/sports')->controller(SportsController::class)->name('sports.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });

            Route::prefix('/amenities')->controller(AmenitiesController::class)->name('amenities.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });

            Route::prefix('/banners')->controller(BannerController::class)->name('banners.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });

            Route::prefix('/coupons')->controller(CouponsController::class)->name('coupons.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });

        });
    });
});



// Route::get('admin/users', function () {
//     return view('admin.users');
// })->name('admin.users');
// Route::get('admin/venues', function () {
//     return view('admin.venues');
// })->name('admin.venues');
// Route::get('admin/booking', function () {
//     return view('admin.bookings');
// })->name('admin.bookings');
// Route::get('admin/freeze', function () {
//     return view('admin.freeze');
// })->name('admin.freeze');
// Route::get('admin/transaction', function () {
//     return view('admin.transaction');
// })->name('admin.transaction');
// Route::get('admin/configuration', function () {
//     return view('admin.configuration');
// })->name('admin.configuration');
// // Route::get('admin/amenities', function () {
// //     return view('admin.amenities');
// // })->name('admin.amenities');
// Route::get('admin/financialyear', function () {
//     return view('admin.financialyear');
// })->name('admin.financialyear');
// Route::get('/couponscode', function () {
//     return view('admin.couponscode');
// })->name('admin.couponscode');
// Route::get('/subscribers', function () {
//     return view('admin.subscribers');
// })->name('admin.subscribers');
// Route::get('/enquiries', function () {
//     return view('admin.enquiries');
// })->name('admin.enquiries');
// Route::get('/profile', function () {
//     return view('admin.profile');
// })->name('admin.profile');



// // Route::get('index', function() {
// //     return view('users.index');
// // })->name('users.dashboard');
// Route::get('users/matches', function() {
//     return view('users.matches');
// })->name('users.matches');
// Route::get('users/split', function() {
//     return view('users.split');
// })->name('users.split');
// Route::get('users/setting', function() {
//     return view('users.setting');
// })->name('users.setting');
// Route::get('users/booking', function() {
//     return view('users.payment');
// })->name('users.booking');
// Route::get('users/wallet', function() {
//     return view('users.wallet');
// })->name('users.wallet');
// Route::get('users/refer', function() {
//     return view('users.refer');
// })->name('users.refer');
// Route::get('users/bookingturf', function() {
//     return view('users.bookingturf');
// })->name('users.bookingturf');
// Route::get('users/productlanding', function() {
//     return view('users.productlanding');
// })->name('users.productlanding');
// Route::get('users/aboutus', function() {
//     return view('users.aboutus');
// })->name('users.aboutus');
// Route::get('users/terms', function() {
//     return view('users.terms');
// })->name('users.terms');


// Route::get('/client/index', function () {
//     return view('client.index');
// })->name('client.index');
// Route::get('/client/booking', function () {
//     return view('client.booking');
// })->name('client.booking');
// Route::get('/client/request', function () {
//     return view('client.request');
// })->name('client.request');
// Route::get('/client/payments', function () {
//     return view('client.payments');
// })->name('client.payments');
// Route::get('/client/transaction', function () {
//     return view('client.transaction');      
// })->name('client.transaction');
// Route::get('/client/coupons', function () {
//     return view('client.coupons');
// })->name('client.coupons');
// Route::get('/client/account', function () {
//     return view('client.account');
// })->name('client.account');


// Route::get('/demo', function () {
//     return view('users.layouts.demoheader');
// })->name('demo');
// Route::get('/', function () {
//     return view('users.login');
// });


