<?php

use App\Http\Controllers\MejaController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\ReservasiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/admin/dashboard');
});

Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
});

Route::resource('/admin/menu', MenuController::class);
Route::resource('/admin/meja', MejaController::class);
Route::resource('/admin/reservasi', ReservasiController::class);
Route::resource('/admin/user', UserController::class);
Route::resource('/admin/review', ReviewController::class);


//Login
Route::get('web/login', function () {
    return view('web/login');
});
Route::post('/login', [UserController::class, 'login'])->name('login');

//Logout
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

//Regsiter
Route::get('web/register', function () {
    return view('web/register');
});
Route::post('/register', [UserController::class, 'register'])->name('register');

// home
Route::get('web/home', function () {
    return view('web/home');
});

Route::get('web/menu', function () {
    return view('web/menu');
});

Route::get('web/about', function () {
    return view('web/about');
});

Route::get('web/profile', function () {
    return view('web/profile');
});

Route::get('web/review', function () {
    return view('web/review');
});

Route::get('web/reservation', function () {
    return view('web/reservation');
});