<?php

namespace App\Http\Controllers\Api\Residentes;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\Residentes\CreateResidenteTelefonoTipoApiRequest;
use App\Http\Requests\Api\Residentes\UpdateResidenteTelefonoTipoApiRequest;
use App\Models\Residentes\ResidenteTelefonoTipo;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ResidenteTelefonoTipoApiController
 */
class ResidenteTelefonoTipoApiController extends AppbaseController implements HasMiddleware
{

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Residente Telefono Tipos', only: ['index']),
            new Middleware('permission:Ver Residente Telefono Tipos', only: ['show']),
            new Middleware('permission:Crear Residente Telefono Tipos', only: ['store']),
            new Middleware('permission:Editar Residente Telefono Tipos', only: ['update']),
            new Middleware('permission:Eliminar Residente Telefono Tipos', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Residente_telefono_tipos.
     * GET|HEAD /residente_telefono_tipos
     */
    public function index(Request $request): JsonResponse
    {
        $residente_telefono_tipos = QueryBuilder::for(ResidenteTelefonoTipo::class)
            ->with([])
            ->allowedFilters([
                'nombre'
            ])
            ->allowedSorts([
                'nombre'
            ])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($residente_telefono_tipos->toArray(),
            'Tipos de teléfono recuperados con éxito.');
    }

    /**
     * Store a newly created ResidenteTelefonoTipo in storage.
     * POST /residente_telefono_tipos
     */
    public function store(CreateResidenteTelefonoTipoApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $residente_telefono_tipos = ResidenteTelefonoTipo::create($input);

        return $this->sendResponse($residente_telefono_tipos->toArray(), 'Tipo de teléfono creado con éxito.');
    }

    /**
     * Display the specified ResidenteTelefonoTipo.
     * GET|HEAD /residente_telefono_tipos/{id}
     */
    public function show(ResidenteTelefonoTipo $tipo)
    {
        return $this->sendResponse($tipo->toArray(), 'Tipo de teléfono recuperado con éxito.');
    }

    /**
     * Update the specified ResidenteTelefonoTipo in storage.
     * PUT/PATCH /residente_telefono_tipos/{id}
     */
    public function update(UpdateResidenteTelefonoTipoApiRequest $request, $id): JsonResponse
    {
        $residentetelefonotipo = ResidenteTelefonoTipo::findOrFail($id);
        $residentetelefonotipo->update($request->validated());
        return $this->sendResponse($residentetelefonotipo, 'Tipo de teléfono actualizado con éxito.');
    }

    /**
     * Remove the specified ResidenteTelefonoTipo from storage.
     * DELETE /residente_telefono_tipos/{id}
     */
    public function destroy(ResidenteTelefonoTipo $tipo): JsonResponse
    {
        $tipo->delete();
        return $this->sendResponse(null, 'Tipo de teléfono eliminado con éxito.');
    }

}
