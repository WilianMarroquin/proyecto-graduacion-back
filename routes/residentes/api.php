<?php

use App\Http\Controllers\Api\Residentes\GeneroApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('/residentes')->group(function () {

    Route::apiResource('generos', GeneroApiController::class);

});
