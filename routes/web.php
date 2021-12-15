<?php

use App\Http\Controllers\Panel\CategoryController;
use App\Http\Controllers\panel\PostController;
use App\Http\Controllers\panel\UploadFileController;
use App\Http\Controllers\Panel\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::middleware('auth')->get('/profile',[\App\Http\Controllers\Panel\ProfileController::class,'show'])->name('profile');
Route::middleware('auth')->put('/profile',[\App\Http\Controllers\Panel\ProfileController::class,'update'])->name('profile.update');

Route::get('/dashboard', function () {
    return view('panel.index');
})->middleware(['auth'])->name('dashboard');
Route::middleware(['auth', 'admin'])->prefix('/dashboard')->group(function () {

    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/category', CategoryController::class)->except(['show', 'create']);
    Route::get('comments', [\App\Http\Controllers\Panel\CommentController::class, 'index'])->name('comments.index');
    Route::put('comments/{comment}', [\App\Http\Controllers\Panel\CommentController::class, 'update'])->name('comment.update');
    Route::delete('comments/{comment}', [\App\Http\Controllers\Panel\CommentController::class, 'destroy'])->name('comment.destroy');

});
Route::middleware(['auth', 'author'])->prefix('/dashboard')->group(function () {
    Route::post('/upload-file', [UploadFileController::class, 'upload'])->name('upload.file');
    Route::resource('/post', PostController::class);
});

require __DIR__ . '/auth.php';