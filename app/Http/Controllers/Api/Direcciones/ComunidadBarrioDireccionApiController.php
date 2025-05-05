<?php

namespace App\Http\Controllers\Api\Direcciones;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\Direcciones\CreateComunidadBarrioDireccionApiRequest;
use App\Http\Requests\Api\Direcciones\UpdateComunidadBarrioDireccionApiRequest;
use App\Models\Direcciones\ComunidadBarrioDireccion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ComunidadBarrioDireccionApiController
 */
class ComunidadBarrioDireccionApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Comunidad Barrio Direcciones', only: ['index']),
            new Middleware('permission:Ver Comunidad Barrio Direcciones', only: ['show']),
            new Middleware('permission:Crear Comunidad Barrio Direcciones', only: ['store']),
            new Middleware('permission:Editar Comunidad Barrio Direcciones', only: ['update']),
            new Middleware('permission:Eliminar Comunidad Barrio Direcciones', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Comunidad_barrio_direcciones.
     * GET|HEAD /comunidad_barrio_direcciones
     */
    public function index(Request $request): JsonResponse
    {
        $comunidad_barrio_direcciones = QueryBuilder::for(ComunidadBarrioDireccion::class)
            ->allowedFilters([
                'direccion',
                'barrio_id'
            ])
            ->allowedSorts([
                'id',
                'direccion',
                'barrio_id',
            ])
            ->allowedIncludes([
                'barrio',
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($comunidad_barrio_direcciones->toArray(),
            'Direcciones recuperados con éxito.');
    }

    /**
     * Store a newly created ComunidadBarrioDireccion in storage.
     * POST /comunidad_barrio_direcciones
     */
    public function store(CreateComunidadBarrioDireccionApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $comunidad_barrio_direcciones = ComunidadBarrioDireccion::create($input);

        return $this->sendResponse($comunidad_barrio_direcciones->toArray(),
            'Dirección creado con éxito.');
    }

    /**
     * Display the specified ComunidadBarrioDireccion.
     * GET|HEAD /comunidad_barrio_direcciones/{id}
     */
    public function show(ComunidadBarrioDireccion $direccion)
    {
        $direccion->load(
            'barrio'
        );

        return $this->sendResponse($direccion->toArray(),
            'Dirección recuperado con éxito.');
    }

    /**
     * Update the specified ComunidadBarrioDireccion in storage.
     * PUT/PATCH /comunidad_barrio_direcciones/{id}
     */
    public function update(UpdateComunidadBarrioDireccionApiRequest $request, $id): JsonResponse
    {
        $comunidadbarriodireccion = ComunidadBarrioDireccion::findOrFail($id);
        $comunidadbarriodireccion->update($request->validated());
        return $this->sendResponse($comunidadbarriodireccion, 'Dirección actualizado con éxito.');
    }

    /**
     * Remove the specified ComunidadBarrioDireccion from storage.
     * DELETE /comunidad_barrio_direcciones/{id}
     */
    public function destroy(ComunidadBarrioDireccion $direccion): JsonResponse
    {
        $direccion->delete();
        return $this->sendResponse(null, 'Dirección eliminado con éxito.');
    }

}
