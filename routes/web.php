<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('categories', CategoryController::class);
