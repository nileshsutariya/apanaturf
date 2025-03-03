<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('admin/index', function () {
    return view('index');
})->name('admin.index');

Route::get('admin/users', function () {
    return view('users');
})->name('admin.users');

Route::get('admin/venues', function () {
    return view('venues');
})->name('admin.venues');

Route::get('admin/booking', function () {
    return view('bookings');
})->name('admin.bookings');

Route::get('admin/freeze', function () {
    return view('freeze');
})->name('admin.freeze');

Route::get('admin/transaction', function () {
    return view('transaction');
})->name('admin.transaction');

Route::get('admin/configuration', function () {
    return view('configuration');
})->name('admin.configuration');

    Route::get('admin/sports', function () {
        return view('sports');
    })->name('admin.sports');

    Route::get('admin/amenities', function () {
        return view('amenities');
    })->name('admin.amenities');

    Route::get('admin/financialyear', function () {
        return view('financialyear');
    })->name('admin.financialyear');

Route::get('/couponscode', function () {
    return view('couponscode');
})->name('admin.couponscode');
Route::get('/banner', function () {
    return view('banner');
})->name('admin.banner');
Route::get('/subscribers', function () {
    return view('subscribers');
})->name('admin.subscribers');
Route::get('/enquiries', function () {
    return view('enquiries');
})->name('admin.enquiries');
Route::get('/profile', function () {
    return view('profile');
})->name('admin.profile');
// Route::get('/enquiries', function () {
//     return view('enquiries');
// });
// Route::get('/financialyear', function () {
//     return view(view: 'financialyear');
// });


Route::get('/', function () {
    return view('client.index');
});

Route::get('/client/booking', function () {
    return view('client.booking');
});

Route::get('/client/account', function () {
    return view('client.account');
});

Route::get('/client/coupons', function () {
    return view('client.coupons');
});

Route::get('/client/login', function () {
    return view('client.login');
});

Route::get('/client/payments', function () {
    return view('client.payments');
});

Route::get('/client/request', function () {
    return view('client.request');
});

Route::get('/client/transaction', function () {
    return view('client.transaction');
});



Route::get('index', function() {
    return view('users.index');
})->name('users.index');

Route::get('users/matches', function() {
    return view('users.matches');
})->name('users.matches');

Route::get('users/wallet', function() {
    return view('users.wallet');
})->name('users.wallet');

Route::get('users/refer', function() {
    return view('users.refer');
})->name('users.refer');








Route::get('demo', function() {
    return view('users.layouts.demoheader');
})->name('users.demo');
