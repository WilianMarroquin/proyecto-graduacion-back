<?php


use Illuminate\Support\Facades\Route;

Route::prefix('modulo-usuarios')->group(function () {

    Route::prefix('roles')->group(function () {

        Route::get('all', [App\Http\Controllers\Api\RolApiController::class, 'obtenerTodos']);

        Route::post('asignar/permisos/{rol}', [App\Http\Controllers\Api\RolApiController::class, 'asignarPermisosARol']);

        Route::post('quitar/permisos/{rol}', [App\Http\Controllers\Api\RolApiController::class, 'quitarPermisosARol']);

        Route::get('obtener/permisos/asignados/{rol}', [App\Http\Controllers\Api\RolApiController::class, 'obtenerPermisosAsignados']);

    });

    Route::apiResource('roles', App\Http\Controllers\Api\RolApiController::class)
        ->parameters(['roles' => 'rol']);

    Route::prefix('permissions')->group(function () {

        Route::get('all', [App\Http\Controllers\Api\PermissionApiController::class, 'obtenerTodos']);

    });

    Route::apiResource('permissions', App\Http\Controllers\Api\PermissionApiController::class)
        ->parameters(['permissions' => 'permission']);

    Route::apiResource('users', App\Http\Controllers\Api\UserApiController::class);

    Route::prefix('users')->group(function () {

        Route::get('obtener/roles/deUser/{user}', [App\Http\Controllers\Api\UserApiController::class, 'obtenerRolesDeUser']);

        Route::post('asignar/rol/aUser', [App\Http\Controllers\Api\UserApiController::class, 'asignarRolAUser']);

    });

});

