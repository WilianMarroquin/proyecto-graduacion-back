<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\CreateRolApiRequest;
use App\Http\Requests\Api\UpdateRolApiRequest;
use App\Models\Rol;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class RolApiController
 */
class RolApiController extends AppbaseController
{

      /**
  //     * @return array
  //     */
  //    public static function middleware(): array
  //    {
  //        return [
  //            new Middleware('abilities:ver roles', only: ['index', 'show']),
  //            new Middleware('abilities:crear roles', only: ['store']),
  //            new Middleware('abilities:editar roles', only: ['update']),
  //            new Middleware('abilities:eliminar roles', only: ['destroy']),
  //        ];
  //    }

    /**
     * Display a listing of the Roles.
     * GET|HEAD /roles
     */
    public function index(Request $request): JsonResponse
    {
        $roles = QueryBuilder::for(Rol::class)
            ->with([])
            ->allowedFilters([
    'name',
    'guard_name'
])
            ->allowedSorts([
    'name',
    'guard_name'
])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($roles->toArray(), 'roles recuperados con éxito.');
    }


    /**
     * Store a newly created Rol in storage.
     * POST /roles
     */
    public function store(CreateRolApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $roles = Rol::create($input);

        return $this->sendResponse($roles->toArray(), 'Rol creado con éxito.');
    }


    /**
     * Display the specified Rol.
     * GET|HEAD /roles/{id}
     */
    public function show(Rol $rol)
    {
        return $this->sendResponse($rol->toArray(), 'Rol recuperado con éxito.');
    }



    /**
    * Update the specified Rol in storage.
    * PUT/PATCH /roles/{id}
    */
    public function update(UpdateRolApiRequest $request, $id): JsonResponse
    {
        $rol = Rol::findOrFail($id);
        $rol->update($request->validated());
        return $this->sendResponse($rol, 'Rol actualizado con éxito.');
    }

    /**
    * Remove the specified Rol from storage.
    * DELETE /roles/{id}
    */
    public function destroy(Rol $rol): JsonResponse
    {
        $rol->delete();
        return $this->sendResponse(null, 'Rol eliminado con éxito.');
    }

    /**
    * Get columns of the table
    * GET /roles/columns
    */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new Rol)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new Rol)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'Rol',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla roles recuperadas con éxito.');
    }

}
