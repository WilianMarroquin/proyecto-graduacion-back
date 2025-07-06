<?php

namespace App\Http\Controllers\Api\ServicioAgua;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\ServicioAgua\CreateServicioAguaBitacoraApiRequest;
use App\Http\Requests\Api\ServicioAgua\UpdateServicioAguaBitacoraApiRequest;
use App\Models\ServicioAgua\ServicioAguaBitacora;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ServicioAguaBitacoraApiController
 */
class ServicioAguaBitacoraApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Servicio Agua Bitacoras', only: ['index']),
            new Middleware('permission:Ver Servicio Agua Bitacoras', only: ['show']),
            new Middleware('permission:Crear Servicio Agua Bitacoras', only: ['store']),
            new Middleware('permission:Editar Servicio Agua Bitacoras', only: ['update']),
            new Middleware('permission:Eliminar Servicio Agua Bitacoras', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Servicio_agua_bitacoras.
     * GET|HEAD /servicio_agua_bitacoras
     */
    public function index(Request $request): JsonResponse
    {

        $servicio_agua_bitacoras = QueryBuilder::for(ServicioAguaBitacora::class)
            ->allowedFilters([
                'fecha_registro',
                'residente_id',
                AllowedFilter::exact('servicio_agua_id'),
                'transaccion_id',
                'direccion_id',
                'user_transacciona_id',
                'observaciones'
            ])
            ->allowedSorts([
                'fecha_registro',
                'residente_id',
                'servicio_agua_id',
                'transaccion_id',
                'direccion_id',
                'user_transacciona_id',
                'observaciones'
            ])
            ->allowedIncludes([
                'tipoTransaccion',
                'servicioAgua',
                'direccion',
                'userTransacciona',
                'residente'
            ])
            ->defaultSort('-id')
            ->paginate($request->get('per_page', 10));


        return $this->sendResponse($servicio_agua_bitacoras->toArray(),
            'servicio_agua_bitacoras recuperados con éxito.');
    }

    /**
     * Store a newly created ServicioAguaBitacora in storage.
     * POST /servicio_agua_bitacoras
     */
    public function store(CreateServicioAguaBitacoraApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $servicio_agua_bitacoras = ServicioAguaBitacora::create($input);

        return $this->sendResponse($servicio_agua_bitacoras->toArray(), 'ServicioAguaBitacora creado con éxito.');
    }

    /**
     * Display the specified ServicioAguaBitacora.
     * GET|HEAD /servicio_agua_bitacoras/{id}
     */
    public function show(ServicioAguaBitacora $servicioaguabitacora)
    {
        return $this->sendResponse($servicioaguabitacora->toArray(), 'ServicioAguaBitacora recuperado con éxito.');
    }

    /**
     * Update the specified ServicioAguaBitacora in storage.
     * PUT/PATCH /servicio_agua_bitacoras/{id}
     */
    public function update(UpdateServicioAguaBitacoraApiRequest $request, $id): JsonResponse
    {
        $servicioaguabitacora = ServicioAguaBitacora::findOrFail($id);
        $servicioaguabitacora->update($request->validated());
        return $this->sendResponse($servicioaguabitacora, 'ServicioAguaBitacora actualizado con éxito.');
    }

    /**
     * Remove the specified ServicioAguaBitacora from storage.
     * DELETE /servicio_agua_bitacoras/{id}
     */
    public function destroy(ServicioAguaBitacora $servicioaguabitacora): JsonResponse
    {
        $servicioaguabitacora->delete();
        return $this->sendResponse(null, 'ServicioAguaBitacora eliminado con éxito.');
    }

    public function obtenerBitacoras(Request $request): JsonResponse
    {

        $servicio_agua_bitacoras = QueryBuilder::for(ServicioAguaBitacora::class)
            ->allowedFilters([
                'fecha_registro',
                'residente_id',
                AllowedFilter::exact('servicio_agua_id'),
                'transaccion_id',
                'direccion_id',
                'user_transacciona_id',
                'observaciones'
            ])
            ->allowedSorts([
                'fecha_registro',
                'residente_id',
                'servicio_agua_id',
                'transaccion_id',
                'direccion_id',
                'user_transacciona_id',
                'observaciones'
            ])
            ->allowedIncludes([
                'tipoTransaccion',
                'servicioAgua',
                'direccion',
                'userTransacciona',
                'residente'
            ])
            ->defaultSort('-id')
            ->paginate($request->get('per_page', 10));


        return $this->sendResponse($servicio_agua_bitacoras->toArray(),
            'Bitácoras recuperados con éxito.');
    }
}
