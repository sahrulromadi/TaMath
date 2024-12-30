<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;

// route custom untuk admin
require base_path('routes/admin.php');

Route::get('/', function () {
    return view('user.pages.home');
})->name('home');

Route::middleware(['guest'])->group(function () {
    // register
    Route::get('register', function () {
        return view('user.pages.auth.register');
    })->name('register');
    Route::post('register', [AuthController::class, 'store'])->name('register.store');

    // login
    Route::get('login', function () {
        return view('user.pages.auth.login');
    })->name('login');
    Route::post('login', [AuthController::class, 'authenticate'])->name('login.store');
});

Route::middleware(['auth'])->group(function () {
    // logout
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    // quiz
    Route::get('pilih-level', [QuizController::class, 'pilihLevel'])->name('pilih-level');
    Route::get('list-soal/{category}', [QuizController::class, 'listSoal'])->name('list-soal');
    Route::get('question/{question}', [QuizController::class, 'question'])->name('question');
    Route::post('question/', [QuizController::class, 'submitAnswer'])->name('submit-answer');
});
