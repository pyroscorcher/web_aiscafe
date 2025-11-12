<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ArticleController;

Route::get('/', function () {return view('/landing');});
Route::get('/about', function () {return view('/about');})->name('about');
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/admin', [AdminController::class, 'index'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.dashboard');

    
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('products', ProductController::class);
    Route::resource('galleries', GalleryController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('news', NewsController::class);
    Route::resource('articles', ArticleController::class);
    });

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});