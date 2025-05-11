<?php

namespace App\Http\Controllers\Api\ServicioAgua;

use App\Exceptions\ServicioAguaException;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\ServicioAgua\CreateServicioAguaApiRequest;
use App\Http\Requests\Api\ServicioAgua\UpdateServicioAguaApiRequest;
use App\Models\ServicioAgua\ServicioAgua;
use App\Traits\Direccion\DireccionTrait;
use App\Traits\ServicioAgua\ServicioAguaTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ServicioAguaApiController
 */
class ServicioAguaApiController extends AppbaseController implements HasMiddleware
{

    use DireccionTrait;
    use ServicioAguaTrait;

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Servicio Aguas', only: ['index']),
            new Middleware('permission:Ver Servicio Aguas', only: ['show']),
            new Middleware('permission:Crear Servicio Aguas', only: ['store']),
            new Middleware('permission:Editar Servicio Aguas', only: ['update']),
            new Middleware('permission:Eliminar Servicio Aguas', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Servicio_aguas.
     * GET|HEAD /servicio_aguas
     */
    public function index(Request $request): JsonResponse
    {
        $servicio_aguas = QueryBuilder::for(ServicioAgua::class)
            ->allowedFilters([
                'correlativo',
                AllowedFilter::exact('residente_id'),
                'estado_id'
            ])
            ->allowedSorts([
                'correlativo',
                'residente_id',
                'estado_id'
            ])
            ->allowedIncludes([
                'residente'
            ])
            ->defaultSort('-id')
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($servicio_aguas->toArray(), 'Servicio Aguas recuperados con éxito.');
    }

    /**
     * Store a newly created ServicioAgua in storage.
     * POST /servicio_aguas
     */
    public function store(CreateServicioAguaApiRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $direccion = $this->crearDireccion($request->direccion);
            $servicioAgua = $this->crearServicioAgua($request->residente_id, $direccion);
            $this->guardarBitacoraCreacionServicio($servicioAgua, $request, $direccion);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            throw new ServicioAguaException("Error al crear el servicio de agua: " . $e->getMessage());
        }

        return $this->sendResponse($servicioAgua->toArray(), 'Servicio Agua creado con éxito.');
    }

    /**
     * Display the specified ServicioAgua.
     * GET|HEAD /servicio_aguas/{id}
     */
    public function show(ServicioAgua $servicioAgua)
    {
        $servicioAgua->load('residente');

        return $this->sendResponse($servicioAgua->toArray(), 'Servicio Agua recuperado con éxito.');
    }

    /**
     * Update the specified ServicioAgua in storage.
     * PUT/PATCH /servicio_aguas/{id}
     */
    public function update(UpdateServicioAguaApiRequest $request, $id): JsonResponse
    {
        $servicioagua = ServicioAgua::findOrFail($id);
        $servicioagua->update($request->validated());
        return $this->sendResponse($servicioagua, 'Servicio Agua actualizado con éxito.');
    }

    /**
     * Remove the specified ServicioAgua from storage.
     * DELETE /servicio_aguas/{id}
     */
    public function destroy(ServicioAgua $servicioAgua): JsonResponse
    {
        $servicioAgua->delete();
        return $this->sendResponse(null, 'Servicio Agua eliminado con éxito.');
    }

    public function trasladarServicio(Request $request)
    {
        try {
            DB::beginTransaction();
            $direccion = $this->crearDireccion($request->direccion);
            $servicioAgua = $this->trasladarServicioAgua($request);
            $this->guardarBitacoraTrasladoServicio($servicioAgua, $request, $direccion);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            throw new ServicioAguaException("Error al crear el servicio de agua: " . $e->getMessage());
        }

    }

}
