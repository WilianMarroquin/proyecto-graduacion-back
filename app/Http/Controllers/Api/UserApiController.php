<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\CreateUserApiRequest;
use App\Http\Requests\Api\UpdateUserApiRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class UserApiController
 */
class UserApiController extends AppbaseController
{

      /**
  //     * @return array
  //     */
  //    public static function middleware(): array
  //    {
  //        return [
  //            new Middleware('abilities:ver users', only: ['index', 'show']),
  //            new Middleware('abilities:crear users', only: ['store']),
  //            new Middleware('abilities:editar users', only: ['update']),
  //            new Middleware('abilities:eliminar users', only: ['destroy']),
  //        ];
  //    }

    /**
     * Display a listing of the Users.
     * GET|HEAD /users
     */
    public function index(Request $request): JsonResponse
    {
        $users = QueryBuilder::for(User::class)
            ->with([])
            ->allowedFilters([
    'primer_nombre',
    'segundo_nombre',
    'primer_apellido',
    'segundo_apellido',
    'usuario',
    'email',
    'email_verified_at',
    'password',
    'remember_token'
])
            ->allowedSorts([
    'primer_nombre',
    'segundo_nombre',
    'primer_apellido',
    'segundo_apellido',
    'usuario',
    'email',
    'email_verified_at',
    'password',
    'remember_token'
])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($users->toArray(), 'users recuperados con éxito.');
    }


    /**
     * Store a newly created User in storage.
     * POST /users
     */
    public function store(CreateUserApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $users = User::create($input);

        return $this->sendResponse($users->toArray(), 'User creado con éxito.');
    }


    /**
     * Display the specified User.
     * GET|HEAD /users/{id}
     */
    public function show(User $user)
    {
        return $this->sendResponse($user->toArray(), 'User recuperado con éxito.');
    }



    /**
    * Update the specified User in storage.
    * PUT/PATCH /users/{id}
    */
    public function update(UpdateUserApiRequest $request, $id): JsonResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->validated());
        return $this->sendResponse($user, 'User actualizado con éxito.');
    }

    /**
    * Remove the specified User from storage.
    * DELETE /users/{id}
    */
    public function destroy(User $user): JsonResponse
    {
        $user->delete();
        return $this->sendResponse(null, 'User eliminado con éxito.');
    }

    /**
    * Get columns of the table
    * GET /users/columns
    */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new User)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new User)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'User',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla users recuperadas con éxito.');
    }

}
