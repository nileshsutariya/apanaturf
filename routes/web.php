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
});
// Route::get('/enquiries', function () {
//     return view('enquiries');
// });
// Route::get('/financialyear', function () {
//     return view(view: 'financialyear');
// });
Route::get('/', function () {
    return view('users.setting');
});

Route::get('users/matches', function() {
    return view('users.matches');
});
Route::get('users/setting', function() {
    return view('users.setting');
});
