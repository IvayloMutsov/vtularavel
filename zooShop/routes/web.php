<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnimalController;
use App\Http\Controllers\Admin\BreedController;
use App\Http\Controllers\Admin\AnimalTypeController;

Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {
    // Animals CRUD
    Route::resource('animals', AnimalController::class);

    // Breeds CRUD
    Route::resource('breeds', BreedController::class);

    // Animal Types CRUD
    Route::resource('animal-types', AnimalTypeController::class);
});

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';
