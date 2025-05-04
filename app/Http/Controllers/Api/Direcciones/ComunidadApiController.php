<?php

namespace App\Http\Controllers\Api\Direcciones;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\Direcciones\CreateComunidadApiRequest;
use App\Http\Requests\Api\Direcciones\UpdateComunidadApiRequest;
use App\Models\Direcciones\Comunidad;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ComunidadApiController
 */
class ComunidadApiController extends AppbaseController
{

    /**
     * //     * @return array
     * //     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Comunidades', only: ['index']),
            new Middleware('permission:Ver Comunidades', only: ['show']),
            new Middleware('permission:Crear Comunidades', only: ['store']),
            new Middleware('permission:Editar Comunidades', only: ['update']),
            new Middleware('permission:Eliminar Comunidades', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Comunidades.
     * GET|HEAD /comunidades
     */
    public function index(Request $request): JsonResponse
    {
        $comunidades = QueryBuilder::for(Comunidad::class)
            ->with([])
            ->allowedFilters([
                'nombre'
            ])
            ->allowedSorts([
                'id',
                'nombre',
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($comunidades->toArray(), 'comunidades recuperados con éxito.');
    }

    /**
     * Store a newly created Comunidad in storage.
     * POST /comunidades
     */
    public function store(CreateComunidadApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $comunidades = Comunidad::create($input);

        return $this->sendResponse($comunidades->toArray(), 'Comunidad creado con éxito.');
    }

    /**
     * Display the specified Comunidad.
     * GET|HEAD /comunidades/{id}
     */
    public function show(Comunidad $comunidad)
    {
        return $this->sendResponse($comunidad->toArray(), 'Comunidad recuperado con éxito.');
    }

    /**
     * Update the specified Comunidad in storage.
     * PUT/PATCH /comunidades/{id}
     */
    public function update(UpdateComunidadApiRequest $request, $id): JsonResponse
    {
        $comunidad = Comunidad::findOrFail($id);
        $comunidad->update($request->validated());
        return $this->sendResponse($comunidad, 'Comunidad actualizado con éxito.');
    }

    /**
     * Remove the specified Comunidad from storage.
     * DELETE /comunidades/{id}
     */
    public function destroy(Comunidad $comunidad): JsonResponse
    {
        $comunidad->delete();
        return $this->sendResponse(null, 'Comunidad eliminado con éxito.');
    }

    /**
     * Get columns of the table
     * GET /comunidades/columns
     */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new Comunidad)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new Comunidad)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'Comunidad',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla comunidades recuperadas con éxito.');
    }

}
