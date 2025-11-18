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
use App\Http\Controllers\Admin\LandingController;
use App\Http\Controllers\ReviewUserController;

// main routes
Route::get('/', [LandingController::class, 'indexLanding'])->name('landing');
Route::get('/menu', [ProductController::class, 'showMenu'])->name('menu');
Route::get('/about', [GalleryController::class, 'showGallery'])->name('about');
Route::get('/artikel', [ArticleController::class, 'showArticle'])->name('artikel');
Route::get('/artikel/{id}', [ArticleController::class, 'show'])->name('article.detail');

// auth routes
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

// Profile routes
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// USER review creation routes
Route::middleware(['auth'])->group(function () {
    Route::get('/write-review', [ReviewUserController::class, 'create'])->name('user.review.create');
    Route::post('/write-review', [ReviewUserController::class, 'store'])->name('user.review.store');
});