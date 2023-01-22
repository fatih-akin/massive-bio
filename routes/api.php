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

Route::post('/login', [\App\Http\Controllers\AuthenticationController::class, 'login']);
Route::post('/register', [\App\Http\Controllers\AuthenticationController::class, 'register']);

Route::middleware('auth:sanctum')->get('/exchange-rates/{currency}', [\App\Http\Controllers\ExchangeRateController::class, 'show']);
Route::middleware('auth:sanctum')->get('/exchange-rates', [\App\Http\Controllers\ExchangeRateController::class, 'exchange']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
