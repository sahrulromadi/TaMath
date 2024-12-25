<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('user.pages.home');
})->name('home');

Route::middleware(['guest'])->group(function () {
    // register
    Route::get('register/', function () {
        return view('user.pages.auth.register');
    })->name('register.index');
    Route::post('register/', [AuthController::class, 'store'])->name('register.store');

    // login
    Route::get('login/', function () {
        return view('user.pages.auth.login');
    })->name('login.index');
    Route::post('login/', [AuthController::class, 'authenticate'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    // logout
    Route::post('logout/', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/', function () {
        return view('admin.admin');
    })->name('admin');
});
