<?php

use Illuminate\Support\Facades\Route;


Route::get('/', [\App\Http\Controllers\IndexController::class, 'index'])->name('welcome');

Route::get('/reservation', [\App\Http\Controllers\reservationController::class, 'reservation'])->name('reservation');

Route::post('/reservation', [\App\Http\Controllers\reservationController::class, 'confirmReservation'])->name('reservation.reservation');

Route::get('/reservation/annulation/{token}', [\App\Http\Controllers\cancelController::class, 'cancelView'])->name('cancel.reservation');

Route::post('/reservation/annulation/{token}', [\App\Http\Controllers\cancelController::class, 'cancel'])->name('cancel.confirm');

