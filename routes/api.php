<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ReservaApiController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//Usuario
Route::post('/auth/register', [AuthController::class, 'createUser']);
Route::post('/auth/login', [AuthController::class, 'loginUser']);

Route::get('/obtenerMenus', [ReservaApiController::class, 'obtenerMenus']);
Route::get('/obtenerMesas', [ReservaApiController::class, 'obtenerMesas']);
Route::get('/consultarHoras', [ReservaApiController::class, 'consultarHoras']);
Route::get('/consultarFechas', [ReservaApiController::class, 'consultarFechas']);
Route::get('/obtenerReservas', [ReservaApiController::class, 'consultarReservas'])-> middleware('auth:sanctum');
Route::post('/addReserva', [ReservaApiController::class, 'insertarReserva']);
Route::put('/modificarReserva', [ReservaApiController::class, 'actualizarReservas']) -> middleware('auth:sanctum');
Route::delete('/borrarReserva', [ReservaApiController::class, 'borrarReserva']) -> middleware('auth:sanctum');
