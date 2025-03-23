<?php


use Illuminate\Support\Facades\Route;

Route::prefix('modulo-usuarios')->group(function () {

    Route::apiResource('roles', App\Http\Controllers\Api\RolApiController::class)
        ->parameters(['roles' => 'rol']);

    Route::apiResource('permissions', App\Http\Controllers\Api\PermissionApiController::class)
        ->parameters(['permissions' => 'permission']);

});

