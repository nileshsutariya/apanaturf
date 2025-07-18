<?php

use App\Http\Controllers\Customer\AboutController;
use App\Http\Controllers\Customer\BookingTurfController;
use App\Http\Controllers\Customer\LoginCustomerController;
use App\Http\Controllers\Customer\MatchesController;
use App\Http\Controllers\Customer\PaymentController;
use App\Http\Controllers\Customer\ReferController;
use App\Http\Controllers\Customer\RegisterController;
use App\Http\Controllers\Customer\SettingsController;
use App\Http\Controllers\Customer\SplitController;
use App\Http\Controllers\Customer\TermsController;
use App\Http\Controllers\Customer\WalletController;
use App\Http\Controllers\Vendor\ProfileVendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AreaController;
use App\Http\Controllers\admin\CityController;
use App\Http\Controllers\admin\TurfController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\UsersController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\SportsController;
use App\Http\Controllers\admin\VenuesController;
use App\Http\Controllers\admin\CouponsController;
use App\Http\Controllers\admin\ProfileController;
use App\Http\Controllers\Vendor\GroundController;
use App\Http\Controllers\admin\CustomerController;
use App\Http\Controllers\Vendor\BookingController;
use App\Http\Controllers\Vendor\RequestController;
use App\Http\Controllers\admin\AmenitiesController;
use App\Http\Controllers\admin\PermissionsController;
use App\Http\Controllers\Vendor\VendorLoginController;
use App\Http\Controllers\Vendor\CouponsVendorController;
use App\Http\Controllers\admin\PermissionGroupController;
    

Route::prefix('customer')->group(function () {

    Route::get('/index', [RegisterController::class, 'index'])->name('customerindex');

    Route::get('/register', [RegisterController::class, 'register'])->name('customer.register');
    Route::post('/register/check', [RegisterController::class, 'registercheck'])->name('customer.add');

    Route::post('/otpverify', [RegisterController::class, 'VerifyOtp'])->name('register.otp.verify');
    
    Route::get('/login', [LoginCustomerController::class, 'login'])->name('customer.login');
    Route::post('/login/check', [LoginCustomerController::class, 'logincheck'])->name('customer.logincheck');
    Route::post('/otp/verify', [LoginCustomerController::class, 'OTPVerify'])->name('customer.otp.verify');
    
    Route::post('/forgotpassword', [LoginCustomerController::class, 'ForgotPassword'])->name('customer.forgot.password');
    Route::post('/resetpassword', [LoginCustomerController::class, 'ResetPassword'])->name('customer.reset.password');

    Route::prefix('/bookingturf')->controller(BookingTurfController::class)->name('bookingturf.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/product/{id}', 'product')->name('product');
    });
    
    Route::prefix('/terms')->controller(TermsController::class)->name('terms.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::prefix('/about')->controller(AboutController::class)->name('about.')->group(function () {
        Route::get('/', 'index')->name('index');
    });

    
    Route::prefix('/matches')->controller(MatchesController::class)->name('matches.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::prefix('/wallet')->controller(WalletController::class)->name('wallet.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::prefix('/split')->controller(SplitController::class)->name('split.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::prefix('/settings')->controller(SettingsController::class)->name('settings.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
    Route::prefix('/refer')->controller(ReferController::class)->name('refer.')->group(function () {
        Route::get('/', 'index')->name('index');
    });
    
});


Route::prefix('vendor')->group(function () {

    Route::get('/login', [VendorLoginController::class, 'login'])->name('vendor.login');
    Route::post('/login', [VendorLoginController::class, 'logincheck'])->name('vendor.logincheck');
    Route::post('/otpverify', [VendorLoginController::class, 'VerifyOtp'])->name('vendor.otp.verify');
    Route::post('/setpassword', [VendorLoginController::class, 'SetPassword'])->name('vendor.set.password');
    Route::post('/forgotpassword', [VendorLoginController::class, 'ForgotPassword'])->name('vendor.forgot.password');
    Route::post('/resetpassword', [VendorLoginController::class, 'ResetPassword'])->name('vendor.reset.password');
    
    Route::middleware('vendor.login')->group(function () {
        Route::post('/logout', [VendorLoginController::class, 'logout'])->name('vendor.logout');
        Route::get('/dashboard', [VendorLoginController::class, 'dashboard'])->name('vendor.dashboard');
    
        Route::prefix('/ground')->controller(GroundController::class)->name('ground.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });

        Route::prefix('/offers')->controller(CouponsVendorController::class)->name('offers.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
        
        Route::prefix('/booking')->controller(BookingController::class)->name('booking.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
        
        Route::prefix('/request')->controller(RequestController::class)->name('request.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });
       
        Route::prefix('/profile')->controller(ProfileVendorController::class)->name('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
        });

    });
});

Route::prefix('admin')->group(function () {

    Route::get('/login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('/login', [LoginController::class, 'logincheck'])->name('logincheck');

    Route::middleware('admin.login')->group(function () {

        Route::get('/unauthorized', [loginController::class, 'unauthorized'])->name('unauthorized');
        Route::get('/dashboard', [loginController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logout', [loginController::class, 'logout'])->name('logout');

        Route::prefix('/vendor')->controller(VenuesController::class)->name('vendor.')->group(function () {
            Route::post('/approve', 'approve')->name('approve');
            Route::post('/disapprove', 'disapprove')->name('disapprove');
            Route::get('/view/{venue:uuid}', 'view')->name('view');
        });

        Route::prefix('/turf')->controller(TurfController::class)->name('turf.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::get('/view/{id}', 'view')->name('view');
            Route::post('/approve', 'approve')->name('approve');
            Route::post('/disapprove', 'disapprove')->name('disapprove');
        });

        Route::prefix('/profile')->controller(ProfileController::class)->name('profile.')->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
            Route::post('/update', 'update')->name('update');
            Route::post('/delete', 'delete')->name('delete');
        });

        Route::middleware('check.permission')->group(function () {

            Route::prefix('/customer')->controller(CustomerController::class)->name('customer.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
            });
            Route::prefix('/permission')->controller(PermissionsController::class)->name('permission.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });
            Route::prefix('/area')->controller(AreaController::class)->name('area.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });
            Route::prefix('/city')->controller(CityController::class)->name('city.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });
            Route::prefix('/vendor')->controller(VenuesController::class)->name('vendor.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
                Route::post('/approve', 'approve')->name('approve');
                Route::post('/disapprove', 'disapprove')->name('disapprove');
            });
            Route::prefix('/permissiongroup')->controller(PermissionGroupController::class)->name('permissiongroup.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
            });

            Route::prefix('/users')->controller(UsersController::class)->name('users.')->group(function () {
                Route::get('/', 'index')->name('index');
                Route::post('/store', 'store')->name('store');
                Route::post('/delete', 'delete')->name('delete');
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


