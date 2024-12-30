<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        $totalUsers = User::count();

        return view('admin.dashboard', compact('totalUsers'));
    })->name('dashboard');

    Route::resource('question', QuestionController::class)->except(
        ['index', 'show']
    );
    Route::get('question/category/{category}', [QuestionController::class, 'index'])->name('question.index');
});
