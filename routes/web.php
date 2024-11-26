<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

route::prefix('movies')->group(function () {
    Route::get('/', [MovieController::class, 'index'])->name('movies');
    Route::get('/create', [MovieController::class, 'create'])->name('movie.create');
    Route::post('/save', [MovieController::class, 'save'])->name('movie.save');
    Route::get('{movie}/edit', [MovieController::class, 'edit'])->name('movie.edit');
    Route::post('/{movie}/update', [MovieController::class, 'update'])->name('movie.update');
    Route::delete('/{movie}/delete', [MovieController::class, 'delete'])->name('movie.delete');
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
