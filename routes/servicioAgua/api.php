<?php


use App\Http\Controllers\Api\ServicioAgua\ServicioAguaEstadoApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('servicio/agua')->group(function () {

    Route::prefix('estados')->group(function () {

        Route::apiResource('/', ServicioAguaEstadoApiController::class)
            ->parameters(['' => 'estado']);

    });

});
