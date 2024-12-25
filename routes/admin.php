<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/', function () {
        return view('admin.admin');
    })->name('admin');
});
