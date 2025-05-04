<?php

use App\Http\Controllers\Api\Direcciones\ComunidadApiController;
use App\Http\Controllers\Api\Direcciones\ComunidadBarrioApiController;

use Illuminate\Support\Facades\Route;

Route::prefix('/direccion')->group(function () {

    Route::prefix('/comunidades')->group(function () {

        Route::get('obtener/todas', [ComunidadApiController::class, 'obtenerTodos']);

        Route::apiResource('/', ComunidadApiController::class)->parameters(['' => 'comunidad']);

    });

    Route::prefix('/comunidad/barrios')->group(function () {

        Route::apiResource('/', ComunidadBarrioApiController::class)->parameters(['' => 'barrio']);

    });
});

