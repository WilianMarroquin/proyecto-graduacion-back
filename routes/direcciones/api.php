<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/direccion')->group(function () {

    Route::apiResource('comunidades', \App\Http\Controllers\Api\Direcciones\ComunidadApiController::class)
        ->parameters(['comunidades' => 'comunidad']);

    Route::apiResource('comunidad/barrios', App\Http\Controllers\Api\Direcciones\ComunidadBarrioApiController::class);
});

