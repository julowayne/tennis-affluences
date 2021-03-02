<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('infos', [\App\Http\Controllers\ApiController::class, 'get']);

Route::post('booking', [\App\Http\Controllers\ApiController::class, 'addReservation']);

Route::post('booking/{token}', [\App\Http\Controllers\ApiController::class, 'deleteReservation'] );

