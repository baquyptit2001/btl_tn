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

Route::middleware(['web'])->group(function () {
    Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');
});


Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('/', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin'], 'as' => 'admin.'], function () {
    Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'categories', 'as' => 'categories.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\CategoryController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\CategoryController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\CategoryController::class, 'store'])->name('store');
        Route::get('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'show'])->name('show');
        Route::get('/{category}/edit', [\App\Http\Controllers\Admin\CategoryController::class, 'edit'])->name('edit');
        Route::put('/{category}', [\App\Http\Controllers\Admin\CategoryController::class, 'update'])->name('update');
        Route::get('/{category}/delete', [\App\Http\Controllers\Admin\CategoryController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\PostController::class, 'index'])->name('index');
        Route::get('/create', [\App\Http\Controllers\Admin\PostController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Admin\PostController::class, 'store'])->name('store');
        Route::get('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'show'])->name('show');
        Route::get('/{post}/edit', [\App\Http\Controllers\Admin\PostController::class, 'edit'])->name('edit');
        Route::put('/{post}', [\App\Http\Controllers\Admin\PostController::class, 'update'])->name('update');
        Route::get('/{post}/delete', [\App\Http\Controllers\Admin\PostController::class, 'destroy'])->name('destroy');
    });
    Route::group(['prefix' => 'home-posts', 'as' => 'home-posts.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\HomePostController::class, 'index'])->name('index');
        Route::get('/save/{slug?}', [\App\Http\Controllers\Admin\HomePostController::class, 'save'])->name('save');
        Route::get('/delete/{homePost}', [\App\Http\Controllers\Admin\HomePostController::class, 'destroy'])->name('destroy');
        Route::post('/update-order', [\App\Http\Controllers\Admin\HomePostController::class, 'updateOrder'])->name('update-order');
    });
    Route::group(['prefix' => 'statistic', 'as' => 'statistic.'], function () {
        Route::get('/', [\App\Http\Controllers\Admin\StatisticController::class, 'index'])->name('index');
    });
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
\UniSharp\LaravelFilemanager\Lfm::routes();
});

Auth::routes();

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/post/{post}', [\App\Http\Controllers\Client\PostController::class, 'show'])->name('posts.show');
Route::get('/post', [\App\Http\Controllers\Client\PostController::class, 'list'])->name('posts.list');

Route::post('/comment/save', [\App\Http\Controllers\Client\CommentController::class, 'save'])->name('comments.save')->middleware('auth');

Route::group(['prefix' => 'chat', 'middleware' => ['auth'], 'as' => 'chat.'], function () {
    Route::get('/', [\App\Http\Controllers\Client\ChatController::class, 'index'])->name('index')->middleware('is_admin');
    Route::get('/show/{user?}', [\App\Http\Controllers\Client\ChatController::class, 'show'])->name('show');
    Route::post('/{user}', [\App\Http\Controllers\Client\ChatController::class, 'send'])->name('send');
});
