<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DepositController;
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

Route::get('firstLogin', [AuthController::class, 'firstLogin'])->name('auth.firstLogin.get');
Route::post('firstLogin', [AuthController::class, 'handleFirstLogin'])->name('auth.firstLogin.post');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', [UserController::class, 'index'])->name('user.index');
    Route::prefix('profile') -> group(function () {
        Route::get('/', [UserController::class, 'profile'])->name('user.profile.get');
        Route::post('/', [UserController::class, 'handleProfile'])->name('user.profile.update');
    });
    Route::prefix('deposit') -> group(function () {
        Route::get('/', [DepositController::class, 'deposit'])->name('user.deposit.get');
        Route::post('/', [DepositController::class, 'handleDeposit'])->name('user.deposit.post');
    });
});

Route::get('logout', [AuthController::class, 'logout'])->name('logout')->middleware('prevent-back-history');
