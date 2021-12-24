<?php

use App\Http\Controllers\CommentController as LandingCommentController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\panel\CommentController;
use App\Http\Controllers\Panel\DashboardController;
use App\Http\Controllers\panel\PostController;
use App\Http\Controllers\panel\UploadFileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::get('/', [LandingController::class, 'index'])->name('index');
Route::get('/', [LandingController::class, 'index'])->name('index');

Route::get('/post/{post:slug}', [\App\Http\Controllers\SinglePostController::class, 'show'])->name('show.single.post');

Route::post('comments_store', [LandingCommentController::class, 'store'])->name('comment.store');

Route::middleware('auth')->get('/profile', [\App\Http\Controllers\Panel\ProfileController::class, 'show'])->name('profile');
Route::middleware('auth')->put('/profile', [\App\Http\Controllers\Panel\ProfileController::class, 'update'])->name('profile.update');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::middleware(['auth', 'admin'])->prefix('/dashboard')->group(function () {

    Route::resource('/users', \App\Http\Controllers\Panel\UserController::class)->except(['show']);
    Route::resource('/category', CategoryController::class)->except(['show', 'create']);

    Route::get('comments', [CommentController::class, 'index'])->name('comments.index');
    Route::put('comments/{comment}', [CommentController::class, 'update'])->name('comment.update');
    Route::delete('comments/{comment}', [CommentController::class, 'destroy'])->name('comment.destroy');

});
Route::middleware(['auth', 'author'])->prefix('/dashboard')->group(function () {
    Route::post('/upload-file', [UploadFileController::class, 'upload'])->name('upload.file');
    Route::resource('/post', PostController::class);
});

require __DIR__ . '/auth.php';