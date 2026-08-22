<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\DatePlanController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DatePlanController::class, 'home'])->name('dates.home');
Route::get('/our-dates', [DatePlanController::class, 'index'])->name('dates.index');
Route::get('/plan/{category}', [DatePlanController::class, 'category'])->name('dates.category');
Route::get('/plan/{category}/{place}', [DatePlanController::class, 'create'])->name('dates.create');
Route::post('/plan/{category}/{place}', [DatePlanController::class, 'store'])->name('dates.store');
Route::get('/dates/{plan}', [DatePlanController::class, 'show'])->name('dates.show');

Route::get('/blog', [BlogController::class, 'index'])->name('blog.index');
Route::get('/blog/{id}', [BlogController::class, 'show'])->name('blog.show');
Route::get('/post/{slug}', [BlogController::class, 'show'])->name('blog.post');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.attempt');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
    Route::resource('posts', AdminPostController::class)->names('posts');
});
