<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\InmuebleController;
use App\Http\Controllers\CodigoController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    // Route::get('/user', [AuthController::class, 'user']);
    Route::resource('/inmuebles', InmuebleController::class);
    Route::get('/inmuebles/own/{id}', [InmuebleController::class, 'own']);
    Route::get('/inmuebles/pdf/{id}', [InmuebleController::class, 'pdf']);
    Route::resource('/codigos', CodigoController::class);
});
