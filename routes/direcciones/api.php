<?php

use App\Http\Controllers\Api\Direcciones\ComunidadApiController;
use App\Http\Controllers\Api\Direcciones\ComunidadBarrioApiController;
use App\Http\Controllers\Api\Direcciones\ComunidadBarrioDireccionApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/direccion')->group(function () {

    Route::prefix('/comunidad/barrios')->group(function () {

        Route::prefix('direcciones')->group(function () {

            Route::apiResource('/', ComunidadBarrioDireccionApiController::class)
                ->parameters(['' => 'direccion']);

        });

        Route::get('obtener/todas', [ComunidadBarrioApiController::class, 'obtenerTodos']);

        Route::apiResource('/', ComunidadBarrioApiController::class)->parameters(['' => 'barrio']);
    });

    Route::prefix('/comunidades')->group(function () {

        Route::get('obtener/todas', [ComunidadApiController::class, 'obtenerTodos']);

        Route::apiResource('/', ComunidadApiController::class)
            ->parameters(['' => 'comunidad']);

    });

});

