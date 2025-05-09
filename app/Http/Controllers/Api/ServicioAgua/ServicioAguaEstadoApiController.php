<?php

namespace App\Http\Controllers\Api\ServicioAgua;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\ServicioAgua\CreateServicioAguaEstadoApiRequest;
use App\Http\Requests\Api\ServicioAgua\UpdateServicioAguaEstadoApiRequest;
use App\Models\ServicioAgua\ServicioAguaEstado;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ServicioAguaEstadoApiController
 */
class ServicioAguaEstadoApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Servicio Agua Estados', only: ['index']),
            new Middleware('permission:Ver Servicio Agua Estados', only: ['show']),
            new Middleware('permission:Crear Servicio Agua Estados', only: ['store']),
            new Middleware('permission:Editar Servicio Agua Estados', only: ['update']),
            new Middleware('permission:Eliminar Servicio Agua Estados', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Servicio_agua_estados.
     * GET|HEAD /servicio_agua_estados
     */
    public function index(Request $request): JsonResponse
    {
        $servicio_agua_estados = QueryBuilder::for(ServicioAguaEstado::class)
            ->with([])
            ->allowedFilters([
                'nombre'
            ])
            ->allowedSorts([
                'nombre'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($servicio_agua_estados->toArray(), 'servicio_agua_estados recuperados con éxito.');
    }

    /**
     * Store a newly created ServicioAguaEstado in storage.
     * POST /servicio_agua_estados
     */
    public function store(CreateServicioAguaEstadoApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $servicio_agua_estados = ServicioAguaEstado::create($input);

        return $this->sendResponse($servicio_agua_estados->toArray(), 'Estado creado con éxito.');
    }

    /**
     * Display the specified ServicioAguaEstado.
     * GET|HEAD /servicio_agua_estados/{id}
     */
    public function show(ServicioAguaEstado $estado)
    {
        return $this->sendResponse($estado->toArray(), 'Estado recuperado con éxito.');
    }

    /**
     * Update the specified ServicioAguaEstado in storage.
     * PUT/PATCH /servicio_agua_estados/{id}
     */
    public function update(UpdateServicioAguaEstadoApiRequest $request, $id): JsonResponse
    {
        $servicioaguaestado = ServicioAguaEstado::findOrFail($id);
        $servicioaguaestado->update($request->validated());
        return $this->sendResponse($servicioaguaestado, 'ServicioAguaEstado actualizado con éxito.');
    }

    /**
     * Remove the specified ServicioAguaEstado from storage.
     * DELETE /servicio_agua_estados/{id}
     */
    public function destroy(ServicioAguaEstado $estado): JsonResponse
    {
        $estado->delete();
        return $this->sendResponse(null, 'Estado eliminado con éxito.');
    }


}
