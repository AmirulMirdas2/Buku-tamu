<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminGuestController;

Route::get('/', [GuestController::class, 'create']);
Route::resource('guest', GuestController::class)->except(['show', 'edit', 'update']);

Auth::routes();

// Admin routes dengan middleware auth
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/guests', [AdminGuestController::class, 'index'])->name('admin.guests.index');
    Route::get('/admin/guests/search', [AdminGuestController::class, 'search'])->name('admin.guests.search');
    Route::get('/admin/guests/print', [AdminGuestController::class, 'print'])->name('admin.guests.print');
    Route::delete('/admin/guests/{guest}', [AdminGuestController::class, 'destroy'])->name('admin.guests.destroy');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])
        ->name('profile.update-password');
});
