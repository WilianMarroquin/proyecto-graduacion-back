<?php

use App\Http\Controllers\Api\Residentes\ResidenteApiController;
use App\Http\Controllers\Api\ServicioAgua\ServicioAguaApiController;
use App\Http\Controllers\Api\ServicioAgua\ServicioAguaBitacoraApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user()->responseUser();
});

Route::middleware('auth:sanctum')->group(function () {

    require __DIR__.'/admin/api.php';

    require __DIR__.'/direcciones/api.php';

    require __DIR__.'/residentes/api.php';

    require __DIR__.'/servicioAgua/api.php';

});

require __DIR__.'/auth.php';

Route::prefix('libres')->group(function () {

    require __DIR__.'/admin/Configuraciones/api_libres.php';

    Route::get('/obtener/residentes', [ResidenteApiController::class, 'obtenerResidentes']);

    Route::get('/obtener/servicios/agua', [ServicioAguaApiController::class, 'obtenerServiciosAgua']);

    Route::get('/obtener/bitacoras', [ServicioAguaBitacoraApiController::class, 'obtenerBitacoras']);

});


Route::apiResource('servicio_agua_bitacoras', App\Http\Controllers\Api\ServicioAgua\ServicioAguaBitacoraApiController::class)
        ->parameters(['servicio_agua_bitacoras' => 'servicioaguabitacora']);
