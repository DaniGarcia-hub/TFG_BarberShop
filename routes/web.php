<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth', 'verified', RoleMiddleware::using('admin|peluquero')])->name('admin.')->group(function () {
    Route::get('/admin', function () {
        return view('administracion');
    })->name('inicio');

    Route::middleware([RoleMiddleware::using('admin')])->group(function () {
        Route::get('users/desactived', [UserController::class, 'desactived'])->name('users.desactived');
        Route::patch('users/{id}/restore', [UserController::class, 'restore'])->name('users.restore');

        Route::resource('users', UserController::class);
    });

    Route::get('schedules/desactived', [ScheduleController::class, 'desactived'])->name('schedules.desactived');
    Route::patch('schedules/{id}/restore', [ScheduleController::class, 'restore'])->name('schedules.restore');
    Route::resource('schedules', ScheduleController::class);

    Route::get('haircuts/desactived', [HaircutController::class, 'desactived'])->name('haircuts.desactived');
    Route::patch('haircuts/{id}/restore', [HaircutController::class, 'restore'])->name('haircuts.restore');
    Route::resource('haircuts', HaircutController::class);

    Route::get('bookings/available-slots', [BookingController::class, 'getAvailableSlots'])->name('bookings.available-slots');
    Route::get('bookings/calendar-json', [BookingController::class, 'getCalendarBookings'])->name('bookings.calendar-json');
    Route::get('bookings/desactived', [BookingController::class, 'desactived'])->name('bookings.desactived');
    Route::patch('bookings/{id}/restore', [BookingController::class, 'restore'])->name('bookings.restore');
    Route::resource('bookings', BookingController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('clientbooking/calendar-json', [ClientBookingController::class, 'getCalendarBookings'])->name('clientbookings.calendar-json');
    Route::get('clientbooking/create', [ClientBookingController::class, 'create'])->name('clientbookings.create');
    Route::get('clientbooking/available-slots', [ClientBookingController::class, 'getAvailableSlots'])->name('clientbookings.available-slots');
    Route::post('clientbooking/store', [ClientBookingController::class, 'store'])->name('clientbookings.store');
    Route::get('clientbooking/{booking}', [ClientBookingController::class, 'show'])->name('clientbookings.show');
    Route::get('clientbooking/{booking}/edit', [ClientBookingController::class, 'edit'])->name('clientbookings.edit');
    Route::put('clientbooking/{booking}', [ClientBookingController::class, 'update'])->name('clientbookings.update');
});

require __DIR__.'/auth.php';
