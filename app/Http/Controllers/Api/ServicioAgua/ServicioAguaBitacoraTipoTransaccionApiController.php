<?php

namespace App\Http\Controllers\Api\ServicioAgua;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\ServicioAgua\CreateServicioAguaBitacoraTipoTransaccionApiRequest;
use App\Http\Requests\Api\ServicioAgua\UpdateServicioAguaBitacoraTipoTransaccionApiRequest;
use App\Models\ServicioAgua\ServicioAguaBitacoraTipoTransaccion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ServicioAguaBitacoraTipoTransaccionApiController
 */
class ServicioAguaBitacoraTipoTransaccionApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Servicio Agua Bitacora Tipo Transacciones', only: ['index']),
            new Middleware('permission:Ver Servicio Agua Bitacora Tipo Transacciones', only: ['show']),
            new Middleware('permission:Crear Servicio Agua Bitacora Tipo Transacciones', only: ['store']),
            new Middleware('permission:Editar Servicio Agua Bitacora Tipo Transacciones', only: ['update']),
            new Middleware('permission:Eliminar Servicio Agua Bitacora Tipo Transacciones', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Servicio_agua_bitacora_tipo_transacciones.
     * GET|HEAD /servicio_agua_bitacora_tipo_transacciones
     */
    public function index(Request $request): JsonResponse
    {
        $servicio_agua_bitacora_tipo_transacciones = QueryBuilder::for(ServicioAguaBitacoraTipoTransaccion::class)
            ->with([])
            ->allowedFilters([
                'nombre'
            ])
            ->allowedSorts([
                'nombre'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($servicio_agua_bitacora_tipo_transacciones->toArray(),
            'tipos de transacciones recuperados con éxito.');
    }

    /**
     * Store a newly created ServicioAguaBitacoraTipoTransaccion in storage.
     * POST /servicio_agua_bitacora_tipo_transacciones
     */
    public function store(CreateServicioAguaBitacoraTipoTransaccionApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $servicio_agua_bitacora_tipo_transacciones = ServicioAguaBitacoraTipoTransaccion::create($input);

        return $this->sendResponse($servicio_agua_bitacora_tipo_transacciones->toArray(),
            'Tipo Transacción creado con éxito.');
    }

    /**
     * Display the specified ServicioAguaBitacoraTipoTransaccion.
     * GET|HEAD /servicio_agua_bitacora_tipo_transacciones/{id}
     */
    public function show(ServicioAguaBitacoraTipoTransaccion $transaccion)
    {
        return $this->sendResponse($transaccion->toArray(),
            'Tipo Transacción recuperado con éxito.');
    }

    /**
     * Update the specified ServicioAguaBitacoraTipoTransaccion in storage.
     * PUT/PATCH /servicio_agua_bitacora_tipo_transacciones/{id}
     */
    public function update(UpdateServicioAguaBitacoraTipoTransaccionApiRequest $request, $id): JsonResponse
    {
        $servicioaguabitacoratipotransaccion = ServicioAguaBitacoraTipoTransaccion::findOrFail($id);
        $servicioaguabitacoratipotransaccion->update($request->validated());
        return $this->sendResponse($servicioaguabitacoratipotransaccion,
            'Tipo Transacción actualizado con éxito.');
    }

    /**
     * Remove the specified ServicioAguaBitacoraTipoTransaccion from storage.
     * DELETE /servicio_agua_bitacora_tipo_transacciones/{id}
     */
    public function destroy(ServicioAguaBitacoraTipoTransaccion $transaccion): JsonResponse
    {
        $transaccion->delete();
        return $this->sendResponse(null, 'Tipo Transacción eliminado con éxito.');
    }

}
