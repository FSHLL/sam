<?php

use App\Http\Controllers\CredentialsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TokensController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('welcome'));
Route::get('/dashboard', fn () => view('dashboard'))->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('/tokens', TokensController::class)->only(['store', 'destroy']);
    Route::resource('credentials', CredentialsController::class)->only(['store', 'update', 'destroy']);

    Route::get('projects', fn () => view('project.index'))->name('projects');
    Route::get('projects/{any}', fn () => view('project.index'))->where('any', '.*');
});

require __DIR__.'/auth.php';
