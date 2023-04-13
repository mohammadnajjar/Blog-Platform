<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('comments', CommentController::class)->middleware(['auth', 'admin']);
    Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::put('/comments/{id}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{id}', [CommentController::class, 'destroy'])->name('comments.destroy');
    Route::put('/comments/{id}/approve', [CommentController::class, 'approve'])->name('comments.approve');
    Route::put('/comments/{id}/reject', [CommentController::class, 'reject'])->name('comments.reject');
    Route::resource('users', UserController::class)->middleware(['auth', 'admin']);
    Route::resource('posts', PostController::class)->middleware(['auth', 'admin']);
    Route::resource('tags', TagController::class)->except(['show', 'edit', 'update', 'destroy']);
    Route::get('/posts/filter/{tag}', [PostController::class, 'filterByTag'])->name('posts.filterByTag');
    Route::resource('admin', AdminController::class)->middleware(['auth', 'admin']);
    Route::get('/statistics', [StatisticsController::class, 'index'])->name('statistics.index');

});


Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
