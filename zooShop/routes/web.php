<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AnimalController as AdminAnimalController;
use App\Http\Controllers\Admin\BreedController as AdminBreedController;
use App\Http\Controllers\Admin\AnimalTypeController as AdminAnimalTypeController;
use App\Http\Controllers\PublicController;

// ----------------------------------
// Admin Routes (CRUD)
// ----------------------------------
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {

    // Animals
    Route::resource('animals', AdminAnimalController::class);

    // Breeds
    Route::resource('breeds', AdminBreedController::class);

    // Animal Types
    Route::resource('animal-types', AdminAnimalTypeController::class);

});

// ----------------------------------
// Public Routes
// ----------------------------------

// Homepage - latest animals
Route::get('/', [PublicController::class, 'home'])->name('home');

// Animals list with filters
Route::get('/animals', [PublicController::class, 'listAnimals'])->name('animals.list');

// Single animal details
Route::get('/animals/{animal}', [PublicController::class, 'showAnimal'])->name('animals.show');

// ----------------------------------
// Auth, Dashboard, Profile
// ----------------------------------
Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

// Include Breeze auth routes
require __DIR__.'/auth.php';