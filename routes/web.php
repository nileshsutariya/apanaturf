<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('admin/index', function () {
    return view('index');
})->name('admin.index');

Route::get('admin/users', function () {
    return view('users');
})->name('admin.users');

Route::get('/amenities', function () {
    return view('amenities');
});
Route::get('banner', function () {
    return view('banner');
});
Route::get('booking', function () {
    return view('bookings');
});
Route::get('/couponscode', function () {
    return view('couponscode');
});
// Route::get('/enquiries', function () {
//     return view('enquiries');
// });
// Route::get('/financialyear', function () {
//     return view(view: 'financialyear');
// });
Route::get('/', function () {
    return view('users.index');
});

Route::get('users/matches', function() {
    return view('users.matches');
})->name('users.matches');

Route::get('users/wallet', function() {
    return view('users.wallet');
})->name('users.wallet');


Route::get('users/setting', function() {
    return view('users.setting');
});
