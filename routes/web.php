<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('welcome');

Route::get('/reservation', [\App\Http\Controllers\ReservationController::class, 'reservation'])->name('reservation');

Route::post('/reservation', [\App\Http\Controllers\ReservationController::class, 'confirmReservation'])->name('reservation.reservation');

Route::get('/reservation/annulation/{token}', [\App\Http\Controllers\CancelController::class, 'cancelView'])->name('cancel.reservation');

Route::post('/reservation/annulation/{token}', [\App\Http\Controllers\CancelController::class, 'cancel'])->name('cancel.confirm');

