<?php

use App\Http\Controllers\Api\FilesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Auth\JwtAuthController;

/*** API Routes */

Route::group(['prefix' => 'v1'], function () {
    // Jwt Authentication
    Route::post('register', [JwtAuthController::class, 'register'])->name('api.jwt.register');
    Route::post('login', [JwtAuthController::class, 'login'])->name('api.jwt.login');

    Route::group(['middleware' => 'auth:api'], function () {
        // Auth
        Route::get('user', [JwtAuthController::class, 'me'])->name('api.jwt.user');
        Route::get('refresh', [JwtAuthController::class, 'refresh'])->name('api.jwt.refresh');
        Route::get('logout', [JwtAuthController::class, 'logout'])->name('api.jwt.logout');

        // Contacts
        Route::get('contacts', [ContactController::class, 'index'])->name('api.contacts.index');
        Route::get('contacts/{id}', [ContactController::class, 'show'])->name('api.contacts.show');
        Route::post('contacts', [ContactController::class, 'store'])->name('api.contacts.store');
        Route::put('contacts/{id}', [ContactController::class, 'update'])->name('api.contacts.update');
        Route::delete('contacts/{id}', [ContactController::class, 'destroy'])->name('api.contacts.delete');

        // Projects
        Route::resource('projects', ProjectController::class);
        Route::post('projects/file-upload', [FilesController::class, 'store']);

        // Tasks
        Route::resource('tasks', TaskController::class);
    });
});
