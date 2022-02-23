<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\ExchangeRateController;

use App\Http\Controllers\SPA\AuthController;

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

Route::middleware('auth:api')->as('api.')->group(function () {
    Route::get('/offices', [OfficeController::class, 'index'])->name('offices.index');
    Route::get('/rates', [ExchangeRateController::class, 'index'])->name('rates.index');
    Route::post('/rates/create', [ExchangeRateController::class, 'store'])->name('rates.store');
});

// SPA routes
Route::post('/login', [AuthController::class, 'login'])->name('spa.login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('spa.logout');
});