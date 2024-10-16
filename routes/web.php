<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserAuthController;
use Illuminate\Auth\Middleware\RedirectIfAuthenticated;
use Illuminate\Support\Facades\Route;

Route::middleware(RedirectIfAuthenticated::class)->group(function () {

    Route::get('/register', [UserAuthController::class, 'create'])->name('user.create');
    Route::post('/register', [UserAuthController::class, 'store'])->name('user.store');
    Route::get('/login', [UserAuthController::class, 'createSession'])->name('user.createSession');
    Route::post('/login', [UserAuthController::class, 'storeSession'])->name('user.storeSession');

    Route::get('/login-otp-page', [UserAuthController::class, 'viewPageEmailToSendOtp'])->name('user.viewPageEmailToSendOtp');
    Route::post('/checkEmail', [UserAuthController::class, 'checkEmailAndSentOTP'])->name('user.checkEmailAndSentOTP');
    Route::get('/login-with-otp', [UserAuthController::class, 'viewPageCheckOtp'])->name('user.viewPageCheckOtp');
    Route::post('/login-with-otp', [UserAuthController::class, 'loginWithOTP'])->name('user.loginOTP');

});

Route::middleware('user.authenticated')->group(function () {

    Route::post('/logout', [UserAuthController::class, 'destroySession'])->name('user.destroySession');
    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

});


Route::prefix('dashboard')->group(function () {

    Route::middleware('admin.redirect.authenticated')->group(function () {

        Route::get('/',function () {
            return view('dashboard');
        })->name('dashboard');

        Route::get('/register', [AdminAuthController::class, 'create'])->name('admin.create');
        Route::post('/register', [AdminAuthController::class, 'store'])->name('admin.store');
        Route::get('/login', [AdminAuthController::class, 'createSession'])->name('admin.createSession');
        Route::post('/login', [AdminAuthController::class, 'storeSession'])->name('admin.storeSession');

        Route::get('/login-otp-page', [AdminAuthController::class, 'viewPageEmailToSendOtp'])->name('admin.viewPageEmailToSendOtp');
        Route::post('/checkEmail', [AdminAuthController::class, 'checkEmailAndSentOTP'])->name('admin.checkEmailAndSentOTP');
        Route::get('/login-with-otp', [AdminAuthController::class, 'viewPageCheckOtp'])->name('admin.viewPageCheckOtp');
        Route::post('/login-with-otp', [AdminAuthController::class, 'loginWithOTP'])->name('admin.loginOTP');

    });


    Route::middleware('admin.authenticated')->group(function () {

        Route::post('logout', [AdminAuthController::class, 'destroySession'])->name('admin.destroySession');
        Route::resource('/categories', CategoryController::class);
        Route::resource('/products', ProductController::class);
    });


});