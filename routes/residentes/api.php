<?php

use App\Http\Controllers\Api\Residentes\GeneroApiController;
use App\Http\Controllers\Api\Residentes\ResidenteApiController;
use App\Http\Controllers\Api\Residentes\ResidenteTelefonoApiController;
use App\Http\Controllers\Api\Residentes\ResidenteTelefonoTipoApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/residentes')->group(function () {

    Route::get('generos/obtener/todos', [GeneroApiController::class, 'obtenerTodos']);

    Route::apiResource('generos', GeneroApiController::class);

    Route::prefix('/telefonos')->group(function () {

        Route::prefix('/tipos')->group(function () {

            Route::get('obtener/todos', [ResidenteTelefonoTipoApiController::class, 'obtenerTodos']);

            Route::apiResource('/', ResidenteTelefonoTipoApiController::class)
                ->parameters(['' => 'tipo']);
        });

        Route::get('obtener/telefonos/de/residente/{residente}', [ResidenteTelefonoApiController::class, 'obtenerTelefonosDeResidente']);

        Route::apiResource('/', ResidenteTelefonoApiController::class)
            ->parameters(['' => 'telefono']);

    });

    Route::get('obtener/todos-residentes', [ResidenteApiController::class, 'obtenerTodosResidentes']);

    Route::apiResource('/', ResidenteApiController::class)
        ->parameters(['' => 'residente']);
});
