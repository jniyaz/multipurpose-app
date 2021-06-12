<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\JwtAuthController;

/*** API Routes */

Route::group(['prefix' => 'v1'], function () {
    // Jwt Authentication
    Route::post('register', [JwtAuthController::class, 'register'])->name('api.jwt.register');
    Route::post('login', [JwtAuthController::class, 'login'])->name('api.jwt.login');

    Route::group(['middleware' => 'auth:api'], function(){
        Route::get('user', [JwtAuthController::class, 'me'])->name('api.jwt.user');
        Route::get('refresh', [JwtAuthController::class, 'refresh'])->name('api.jwt.refresh');
        Route::get('logout', [JwtAuthController::class, 'logout'])->name('api.jwt.logout');
    });

    //

});
