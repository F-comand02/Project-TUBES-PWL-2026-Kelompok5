<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use App\Http\Controllers\Auth\TwoFactorController;

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/register', [RegisterController::class, 'create'])
    ->name('register');

    Route::post('/register', [RegisterController::class, 'store']);

});

Route::get('/two-factor', [TwoFactorController::class, 'show'])
    ->name('two-factor.verify');

Route::post('/two-factor', [TwoFactorController::class, 'verify']);

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('/two-factor/enable', function (Request $request) {
        $request->user()->update(['two_factor_enabled' => true]);
        return back()->with('message', 'Two-factor authentication enabled.');
    })->name('two-factor.enable');

    Route::post('/two-factor/disable', function (Request $request) {
        $request->user()->update(['two_factor_enabled' => false]);
        return back()->with('message', 'Two-factor authentication disabled.');
    })->name('two-factor.disable');

});

Route::middleware('auth')->group(function () {

    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])
        ->name('logout');

    Route::post('/two-factor/enable', function (Request $request) {
        $request->user()->update(['two_factor_enabled' => true]);
        return back()->with('message', 'Two-factor authentication enabled.');
    })->name('two-factor.enable');

    Route::post('/two-factor/disable', function (Request $request) {
        $request->user()->update(['two_factor_enabled' => false]);
        return back()->with('message', 'Two-factor authentication disabled.');
    })->name('two-factor.disable');

});