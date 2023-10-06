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

Route::get('/', function () {
    return view('home');
})->name('home');

Route::group(['prefix' => 'contact'], function () {
    Route::get('/', [\App\Http\Controllers\ContactController::class, 'index'])->name('contact');
    Route::post('/', [\App\Http\Controllers\ContactController::class, 'send'])->name('contact.send');
});

Auth::routes();

Route::get('logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

