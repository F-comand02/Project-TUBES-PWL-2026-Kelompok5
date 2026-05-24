<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\LogisticController;

Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/select-role', [App\Http\Controllers\Auth\RoleSelectionController::class, 'create'])
        ->name('role.select');

    Route::post('/select-role', [App\Http\Controllers\Auth\RoleSelectionController::class, 'store'])
        ->name('role.update');
});

Route::middleware(['auth', 'role:admin'])->group(function () {

    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');

});

Route::middleware(['auth', 'role:volunteer'])->group(function () {

    Route::get('/volunteer/dashboard', function () {
        return view('volunteer.dashboard');
    })->name('volunteer.dashboard');

    Route::delete(
    '/volunteer/complaints/{complaint}',
    [ComplaintController::class, 'destroyVolunteer']
    )->name('volunteer.complaints.destroy');

});

Route::middleware(['auth', 'role:citizen'])->group(function () {

    Route::get('/dashboard', function () {
        return view('Citizen.dashboard');
    })->name('dashboard');

});

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::post('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

});

Route::get('/settings', function () {
    return view('settings.index');
})->name('settings.index');

Route::resource('complaints', ComplaintController::class)
    ->middleware('auth');

Route::middleware(['auth'])->group(function () {

    Route::get('/complaints', [ComplaintController::class, 'index'])
        ->name('complaints.index');
});

Route::get('/complaints', [ComplaintController::class, 'index'])
    ->name('complaints.index');

Route::get('/complaints/create', [ComplaintController::class, 'create'])
    ->name('complaints.create');

Route::delete('/complaints/{complaint}', [ComplaintController::class, 'destroy'])
    ->name('complaints.destroy');

Route::middleware(['auth', 'role:volunteer'])->group(function () {

    Route::get('/volunteer/complaints', [ComplaintController::class, 'volunteerIndex'])
            ->name('volunteer.complaints');

    Route::patch('/volunteer/complaints/{complaint}', [ComplaintController::class, 'updateStatus'])
            ->name('volunteer.complaints.update');

    Route::resource('logistics', LogisticController::class);

});