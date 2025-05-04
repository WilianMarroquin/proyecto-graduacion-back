<?php

namespace App\Http\Controllers\Api\Direcciones;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\Direcciones\CreateComunidadBarrioApiRequest;
use App\Http\Requests\Api\Direcciones\UpdateComunidadBarrioApiRequest;
use App\Models\Direcciones\ComunidadBarrio;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ComunidadBarrioApiController
 */
class ComunidadBarrioApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Comunidad Barrios', only: ['index']),
            new Middleware('permission:Ver Comunidad Barrios', only: ['show']),
            new Middleware('permission:Crear Comunidad Barrios', only: ['store']),
            new Middleware('permission:Editar Comunidad Barrios', only: ['update']),
            new Middleware('permission:Eliminar Comunidad Barrios', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Comunidad_barrios.
     * GET|HEAD /comunidad_barrios
     */
    public function index(Request $request): JsonResponse
    {
        $comunidad_barrios = QueryBuilder::for(ComunidadBarrio::class)
            ->with([])
            ->allowedFilters([
                'nombre',
                'comunidad_id'
            ])
            ->allowedSorts([
                'nombre',
                'comunidad_id'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($comunidad_barrios->toArray(), 'Barrios recuperados con éxito.');
    }


    /**
     * Store a newly created ComunidadBarrio in storage.
     * POST /comunidad_barrios
     */
    public function store(CreateComunidadBarrioApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $comunidad_barrios = ComunidadBarrio::create($input);

        return $this->sendResponse($comunidad_barrios->toArray(), 'Barrio creado con éxito.');
    }


    /**
     * Display the specified ComunidadBarrio.
     * GET|HEAD /comunidad_barrios/{id}
     */
    public function show(ComunidadBarrio $barrio)
    {
        return $this->sendResponse($barrio->toArray(), 'Barrio recuperado con éxito.');
    }


    /**
     * Update the specified ComunidadBarrio in storage.
     * PUT/PATCH /comunidad_barrios/{id}
     */
    public function update(UpdateComunidadBarrioApiRequest $request, $id): JsonResponse
    {
        $comunidadbarrio = ComunidadBarrio::findOrFail($id);
        $comunidadbarrio->update($request->validated());
        return $this->sendResponse($comunidadbarrio, 'ComunidadBarrio actualizado con éxito.');
    }

    /**
     * Remove the specified ComunidadBarrio from storage.
     * DELETE /comunidad_barrios/{id}
     */
    public function destroy(ComunidadBarrio $barrio): JsonResponse
    {
        $barrio->delete();
        return $this->sendResponse(null, 'Barrio eliminado con éxito.');
    }

    /**
     * Get columns of the table
     * GET /comunidad_barrios/columns
     */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new ComunidadBarrio)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new ComunidadBarrio)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'ComunidadBarrio',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla comunidad_barrios recuperadas con éxito.');
    }

}
