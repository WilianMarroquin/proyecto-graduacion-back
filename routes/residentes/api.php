<?php

use App\Http\Controllers\Api\Residentes\GeneroApiController;
use App\Http\Controllers\Api\Residentes\ResidenteApiController;
use App\Http\Controllers\Api\Residentes\ResidenteTelefonoApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/residentes')->group(function () {

    Route::get('generos/obtener/todos', [GeneroApiController::class, 'obtenerTodos']);

    Route::apiResource('generos', GeneroApiController::class);

    Route::prefix('/telefonos')->group(function () {

        Route::apiResource('/', ResidenteTelefonoApiController::class)
            ->parameters(['' => 'telefono']);

    });

    Route::apiResource('/', ResidenteApiController::class)
        ->parameters(['' => 'residente']);
});
