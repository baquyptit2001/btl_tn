<?php

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

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('/', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin']], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('admin.dashboard');
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('admin.categories.show');
        Route::get('/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('admin.categories.destroy');
    });
    Route::group(['prefix' => 'posts'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('admin.posts.index');
        Route::get('/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('admin.posts.create');
        Route::post('/', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('admin.posts.store');
        Route::get('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'show'])->name('admin.posts.show');
        Route::get('/{post}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('admin.posts.edit');
        Route::put('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('admin.posts.update');
        Route::delete('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('admin.posts.destroy');
    });
});

Auth::routes();

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

