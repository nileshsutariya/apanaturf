<?php

use App\Livewire\Admin\User\User;
use App\Livewire\Admin\User\Users;
use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\Customer\Customers;

Route::get('admin/index', function () {
    return view('admin.index');
})->name('admin.index');
Route::get('admin/users', function () {
    return view('admin.users');
})->name('admin.users');
Route::get('/admin/customer', Customers::class)->name('admin.customer');

Route::get('admin/venues', function () {
    return view('admin.venues');
})->name('admin.venues');
Route::get('admin/booking', function () {
    return view('admin.bookings');
})->name('admin.bookings');
Route::get('admin/freeze', function () {
    return view('admin.freeze');
})->name('admin.freeze');
Route::get('admin/transaction', function () {
    return view('admin.transaction');
})->name('admin.transaction');
Route::get('admin/configuration', function () {
    return view('admin.configuration');
})->name('admin.configuration');
Route::get('admin/sports', function () {
    return view('admin.sports');
})->name('admin.sports');
Route::get('admin/amenities', function () {
    return view('admin.amenities');
})->name('admin.amenities');
Route::get('admin/financialyear', function () {
    return view('admin.financialyear');
})->name('admin.financialyear');
Route::get('/couponscode', function () {
    return view('admin.couponscode');
})->name('admin.couponscode');
Route::get('/banner', function () {
    return view('admin.banner');
})->name('admin.banner');
Route::get('/subscribers', function () {
    return view('admin.subscribers');
})->name('admin.subscribers');
Route::get('/enquiries', function () {
    return view('admin.enquiries');
})->name('admin.enquiries');
Route::get('/profile', function () {
    return view('admin.profile');
})->name('admin.profile');



Route::get('index', function() {
    return view('users.index');
})->name('users.dashboard');
Route::get('users/matches', function() {
    return view('users.matches');
})->name('users.matches');
Route::get('users/split', function() {
    return view('users.split');
})->name('users.split');
Route::get('users/setting', function() {
    return view('users.setting');
})->name('users.setting');
Route::get('users/booking', function() {
    return view('users.payment');
})->name('users.booking');
Route::get('users/wallet', function() {
    return view('users.wallet');
})->name('users.wallet');
Route::get('users/refer', function() {
    return view('users.refer');
})->name('users.refer');
Route::get('users/bookingturf', function() {
    return view('users.bookingturf');
})->name('users.bookingturf');
Route::get('users/productlanding', function() {
    return view('users.productlanding');
})->name('users.productlanding');
Route::get('users/aboutus', function() {
    return view('users.aboutus');
})->name('users.aboutus');
Route::get('users/terms', function() {
    return view('users.terms');
})->name('users.terms');


Route::get('/client/index', function () {
    return view('client.index');
})->name('client.index');
Route::get('/client/booking', function () {
    return view('client.booking');
})->name('client.booking');
Route::get('/client/request', function () {
    return view('client.request');
})->name('client.request');
Route::get('/client/payments', function () {
    return view('client.payments');
})->name('client.payments');
Route::get('/client/transaction', function () {
    return view('client.transaction');      
})->name('client.transaction');
Route::get('/client/coupons', function () {
    return view('client.coupons');
})->name('client.coupons');
Route::get('/client/account', function () {
    return view('client.account');
})->name('client.account');


Route::get('/demo', function () {
    return view('users.layouts.demoheader');
})->name('demo');
Route::get('/', function () {
    return view('users.login');
});


Route::get('/users', Users::class);
