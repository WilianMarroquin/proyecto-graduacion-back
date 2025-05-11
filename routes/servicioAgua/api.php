<?php


use App\Http\Controllers\Api\ServicioAgua\ServicioAguaApiController;
use App\Http\Controllers\Api\ServicioAgua\ServicioAguaBitacoraTipoTransaccionApiController;
use App\Http\Controllers\Api\ServicioAgua\ServicioAguaEstadoApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('servicio/agua')->group(function () {

    Route::prefix('estados')->group(function () {

        Route::apiResource('/', ServicioAguaEstadoApiController::class)
            ->parameters(['' => 'estado']);

    });

    Route::prefix('bitacora')->group(function () {

        Route::prefix('tipo/transacciones')->group(function () {

            Route::apiResource('/', ServicioAguaBitacoraTipoTransaccionApiController::class)
                ->parameters(['' => 'transaccion']);

        });
    });

    Route::post('/trasladar', [ServicioAguaApiController::class, 'trasladarServicio']);

    Route::apiResource('/', ServicioAguaApiController::class)
        ->parameters(['' => 'servicioAgua']);

});
