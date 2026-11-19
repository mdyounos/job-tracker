
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplicationController;

// Main Dashboard
Route::get('/', [JobApplicationController::class, 'dashboard'])
    ->name('dashboard');

// Dashboard URL
Route::get('/dashboard', [JobApplicationController::class, 'dashboard'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard.home');

// Job Application Routes
Route::resource('jobs', JobApplicationController::class);

// Duplicate Search
Route::get('/jobs/search-duplicate', [JobApplicationController::class, 'searchDuplicate'])
    ->name('jobs.search-duplicate');

// Calendar
Route::get('/calendar', [JobApplicationController::class, 'calendar'])
    ->name('jobs.calendar');

// Profile Routes
Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');

});

require __DIR__.'/auth.php';
