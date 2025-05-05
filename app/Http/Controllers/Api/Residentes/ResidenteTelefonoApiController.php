<?php

namespace App\Http\Controllers\Api\Residentes;

use App\Http\Controllers\AppBaseController;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use App\Http\Requests\Api\Residentes\CreateResidenteTelefonoApiRequest;
use App\Http\Requests\Api\Residentes\UpdateResidenteTelefonoApiRequest;
use App\Models\Residentes\ResidenteTelefono;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ResidenteTelefonoApiController
 */
class ResidenteTelefonoApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Residente Telefonos', only: ['index']),
            new Middleware('permission:Ver Residente Telefonos', only: ['show']),
            new Middleware('permission:Crear Residente Telefonos', only: ['store']),
            new Middleware('permission:Editar Residente Telefonos', only: ['update']),
            new Middleware('permission:Eliminar Residente Telefonos', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Residente_telefonos.
     * GET|HEAD /residente_telefonos
     */
    public function index(Request $request): JsonResponse
    {
        $residente_telefonos = QueryBuilder::for(ResidenteTelefono::class)
            ->allowedFilters([
                'telefono',
                'residente_id'
            ])
            ->allowedSorts([
                'telefono',
                'residente_id'
            ])
            ->allowedIncludes([
                'residente'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($residente_telefonos->toArray(), 'Teléfonos recuperados con éxito.');
    }

    /**
     * Store a newly created ResidenteTelefono in storage.
     * POST /residente_telefonos
     */
    public function store(CreateResidenteTelefonoApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $residente_telefonos = ResidenteTelefono::create($input);

        return $this->sendResponse($residente_telefonos->toArray(), 'Teléfono creado con éxito.');
    }

    /**
     * Display the specified ResidenteTelefono.
     * GET|HEAD /residente_telefonos/{id}
     */
    public function show(ResidenteTelefono $residentetelefono)
    {
        return $this->sendResponse($residentetelefono->toArray(), 'Teléfono recuperado con éxito.');
    }

    /**
     * Update the specified ResidenteTelefono in storage.
     * PUT/PATCH /residente_telefonos/{id}
     */
    public function update(UpdateResidenteTelefonoApiRequest $request, $id): JsonResponse
    {
        $residentetelefono = ResidenteTelefono::findOrFail($id);
        $residentetelefono->update($request->validated());
        return $this->sendResponse($residentetelefono, 'Teléfono actualizado con éxito.');
    }

    /**
     * Remove the specified ResidenteTelefono from storage.
     * DELETE /residente_telefonos/{id}
     */
    public function destroy(ResidenteTelefono $residentetelefono): JsonResponse
    {
        $residentetelefono->delete();
        return $this->sendResponse(null, 'Teléfono eliminado con éxito.');
    }

}
