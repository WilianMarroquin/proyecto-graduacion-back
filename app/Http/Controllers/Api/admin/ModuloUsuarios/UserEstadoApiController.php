<?php

namespace App\Http\Controllers\Api\admin\ModuloUsuarios;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\admin\ModuloUsuarios\CreateUserEstadoApiRequest;
use App\Http\Requests\Api\admin\ModuloUsuarios\UpdateUserEstadoApiRequest;
use App\Models\UserEstado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class UserEstadoApiController
 */
class UserEstadoApiController extends AppbaseController
{

      /**
  //     * @return array
  //     */
  //    public static function middleware(): array
  //    {
  //        return [
  //            new Middleware('abilities:ver users_estados', only: ['index', 'show']),
  //            new Middleware('abilities:crear users_estados', only: ['store']),
  //            new Middleware('abilities:editar users_estados', only: ['update']),
  //            new Middleware('abilities:eliminar users_estados', only: ['destroy']),
  //        ];
  //    }

    /**
     * Display a listing of the Users_estados.
     * GET|HEAD /users_estados
     */
    public function index(Request $request): JsonResponse
    {
        $users_estados = QueryBuilder::for(UserEstado::class)
            ->with([])
            ->allowedFilters([
    'nombre'
])
            ->allowedSorts([
    'nombre'
])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($users_estados->toArray(), 'users_estados recuperados con éxito.');
    }


    /**
     * Store a newly created UserEstado in storage.
     * POST /users_estados
     */
    public function store(CreateUserEstadoApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $users_estados = UserEstado::create($input);

        return $this->sendResponse($users_estados->toArray(), 'UserEstado creado con éxito.');
    }


    /**
     * Display the specified UserEstado.
     * GET|HEAD /users_estados/{id}
     */
    public function show(UserEstado $userestado)
    {
        return $this->sendResponse($userestado->toArray(), 'UserEstado recuperado con éxito.');
    }



    /**
    * Update the specified UserEstado in storage.
    * PUT/PATCH /users_estados/{id}
    */
    public function update(UpdateUserEstadoApiRequest $request, $id): JsonResponse
    {
        $userestado = UserEstado::findOrFail($id);
        $userestado->update($request->validated());
        return $this->sendResponse($userestado, 'UserEstado actualizado con éxito.');
    }

    /**
    * Remove the specified UserEstado from storage.
    * DELETE /users_estados/{id}
    */
    public function destroy(UserEstado $userestado): JsonResponse
    {
        $userestado->delete();
        return $this->sendResponse(null, 'UserEstado eliminado con éxito.');
    }

    /**
    * Get columns of the table
    * GET /users_estados/columns
    */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new UserEstado)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new UserEstado)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'UserEstado',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla users_estados recuperadas con éxito.');
    }

}
