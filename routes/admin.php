<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('question', QuestionController::class)->except(
        ['index', 'show']
    );
    Route::get('question/category/{category_id}', [QuestionController::class, 'index'])->name('question.index');
});
