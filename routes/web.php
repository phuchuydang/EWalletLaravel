<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

Route::prefix('login') -> group(function () {
    Route::get('/', [AuthController::class, 'login'])->name('auth.login.get');
    Route::post('/', [AuthController::class, 'handleLogin'])->name('auth.login.post');
});

Route::prefix('register') -> group(function () {
    Route::get('/', [AuthController::class, 'register'])->name('auth.register.get');
    Route::post('/', [AuthController::class, 'handleRegister'])->name('auth.register.post');
});

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::get('firstLogin', [AuthController::class, 'firstLogin'])->name('auth.firstLogin.get');
    Route::post('firstLogin', [AuthController::class, 'handleFirstLogin'])->name('auth.firstLogin.post');
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('prevent-back-history');
