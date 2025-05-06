<?php

namespace App\Http\Controllers\Api\Residentes;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\Residentes\CreateGeneroApiRequest;
use App\Http\Requests\Api\Residentes\UpdateGeneroApiRequest;
use App\Models\Residentes\Genero;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class GeneroApiController
 */
class GeneroApiController extends AppbaseController implements HasMiddleware
{

      /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Generos', only: ['index']),
            new Middleware('permission:Ver Generos', only: ['show']),
            new Middleware('permission:Crear Generos', only: ['store']),
            new Middleware('permission:Editar Generos', only: ['update']),
            new Middleware('permission:Eliminar Generos', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Generos.
     * GET|HEAD /generos
     */
    public function index(Request $request): JsonResponse
    {
        $generos = QueryBuilder::for(Genero::class)
            ->with([])
            ->allowedFilters([
    'nombre',
    'descripcion',
    'estado'
])
            ->allowedSorts([
    'nombre',
    'descripcion',
    'estado'
])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($generos->toArray(), 'generos recuperados con éxito.');
    }

    /**
     * Store a newly created Genero in storage.
     * POST /generos
     */
    public function store(CreateGeneroApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $input['estado'] = 1;

        $generos = Genero::create($input);

        return $this->sendResponse($generos->toArray(), 'Genero creado con éxito.');
    }

    /**
     * Display the specified Genero.
     * GET|HEAD /generos/{id}
     */
    public function show(Genero $genero)
    {
        return $this->sendResponse($genero->toArray(), 'Genero recuperado con éxito.');
    }

    /**
    * Update the specified Genero in storage.
    * PUT/PATCH /generos/{id}
    */
    public function update(UpdateGeneroApiRequest $request, $id): JsonResponse
    {
        $genero = Genero::findOrFail($id);
        $genero->update($request->validated());
        return $this->sendResponse($genero, 'Genero actualizado con éxito.');
    }

    /**
    * Remove the specified Genero from storage.
    * DELETE /generos/{id}
    */
    public function destroy(Genero $genero): JsonResponse
    {
        $genero->delete();
        return $this->sendResponse(null, 'Genero eliminado con éxito.');
    }

    /**
     * Obtener todos los generos
     */
    public function obtenerTodos(Request $request): JsonResponse
    {
        $generos = QueryBuilder::for(Genero::class)
            ->allowedFilters([
                'nombre',
                'descripcion',
                'estado'
            ])
            ->allowedSorts([
                'nombre',
                'descripcion',
                'estado'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->get();

        return $this->sendResponse($generos->toArray(), 'Generos recuperados con éxito.');
    }

}
