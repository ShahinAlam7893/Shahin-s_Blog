<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CommentController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Home route with the controller and posts data
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/posts/{id}', [HomeController::class, 'readMore'])->name('posts.readMore');

// Dashboard route with authentication middleware
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/comment', [CommentController::class, 'store'])->name('comment.store');
});

// Include authentication routes
require __DIR__.'/auth.php';
