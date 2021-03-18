<?php

use App\Http\Livewire\Auth\Login;
use App\Http\Livewire\Auth\Verify;
use App\Http\Middleware\CheckAdmin;
use App\Http\Livewire\Auth\Register;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Livewire\Auth\Passwords\Email;
use App\Http\Livewire\Auth\Passwords\Reset;
use App\Http\Livewire\Auth\Passwords\Confirm;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\EmailVerificationController;
use App\Http\Controllers\Admin\StoryController as AdminStoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::view('/', 'pages.welcome')->name('home');

Route::group(['middleware' => 'auth'], function () {
    // Dashboard
    Route::view('dashboard', 'pages.dashboard')->name('dashboard');

    // Profiles

    // Route::resource('profile', ProfileController::class);
    Route::get('profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('profile/{id}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{user}', [ProfileController::class, 'update'])->name('profile.update');

    // Stories
    Route::resource('story', StoryController::class);

    // Admin
    Route::group(['prefix' => 'admin', 'middleware' => [CheckAdmin::class]], function () {
        Route::resource('users', UsersController::class);
        Route::resource('stories', AdminStoryController::class);
        Route::put('stories/restore/{id}', [AdminStoryController::class, 'restore'])->name('admin.story.restore');
        Route::delete('stories/delete/{id}', [AdminStoryController::class, 'destroy'])->name('admin.story.destroy');
    });
});

// Auth
Route::middleware('guest')->group(function () {
    Route::get('login', Login::class)
        ->name('login');

    Route::get('register', Register::class)
        ->name('register');
});

Route::get('password/reset', Email::class)
    ->name('password.request');

Route::get('password/reset/{token}', Reset::class)
    ->name('password.reset');

Route::middleware('auth')->group(function () {
    Route::get('email/verify', Verify::class)
        ->middleware('throttle:6,1')
        ->name('verification.notice');

    Route::get('password/confirm', Confirm::class)
        ->name('password.confirm');
});

Route::middleware('auth')->group(function () {
    Route::get('email/verify/{id}/{hash}', EmailVerificationController::class)
        ->middleware('signed')
        ->name('verification.verify');

    Route::post('logout', LogoutController::class)
        ->name('logout');
});
