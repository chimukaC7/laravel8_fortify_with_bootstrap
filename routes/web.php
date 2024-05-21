<?php

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
    return view('welcome');
});

// web.php file specify the routes that are not accessible until a user is verified
Route::middleware(['auth', 'verified','2FA','password_expired'])->group(function () {
    Route::view('home', 'home')->name('home');
    Route::view('password/update', 'auth.passwords.update')->name('passwords.update');
});


Route::middleware(['auth'])->group(function () {
    Route::get('password/expired', [\App\Http\Controllers\Auth\ExpiredPasswordController::class,'expired'])->name('password.expired');
    Route::post('password/post_expired', [\App\Http\Controllers\Auth\ExpiredPasswordController::class,'postExpired'])->name('password.post_expired');
});
