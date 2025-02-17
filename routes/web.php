<?php

use App\Livewire\Dashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('users.index');
});




Route::get('/admin', function () {
    return view('index');
});
Route::get('admin/users', function () {
    return view('users');
});
