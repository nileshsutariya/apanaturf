<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/amenities', function () {
    return view('amenities');
});
Route::get('index', function () {
    return view('index');
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
    return view('profile');
});
