<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('pages.home');
})->name('home');

Route::middleware(['guest'])->group(function () {
    // register
    Route::get('register/', function () {
        return view('pages.auth.register');
    })->name('register.index');
    Route::post('register/', [AuthController::class, 'store'])->name('register.store');

    // login
    Route::get('login/', function () {
        return view('pages.auth.login');
    })->name('login.index');
    Route::post('login/', [AuthController::class, 'authenticate'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    // logout
    Route::post('logout/', [AuthController::class, 'logout'])->name('logout');
});
