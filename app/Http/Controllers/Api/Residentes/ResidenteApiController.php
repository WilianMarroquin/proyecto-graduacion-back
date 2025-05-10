<?php

namespace App\Http\Controllers\Api\Residentes;

use App\Exceptions\ResidenteExeption;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\Residentes\CreateResidenteApiRequest;
use App\Http\Requests\Api\Residentes\UpdateResidenteApiRequest;
use App\Models\Residentes\Residente;
use App\Traits\Residentes\ResidenteTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\DB;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ResidenteApiController
 */
class ResidenteApiController extends AppbaseController implements HasMiddleware
{
    use ResidenteTrait;

    /**
     * @return array
     */
    public static function middleware(): array
    {
        return [
            new Middleware('permission:Listar Residentes', only: ['index']),
            new Middleware('permission:Ver Residentes', only: ['show']),
            new Middleware('permission:Crear Residentes', only: ['store']),
            new Middleware('permission:Editar Residentes', only: ['update']),
            new Middleware('permission:Eliminar Residentes', only: ['destroy']),
        ];
    }

    /**
     * Display a listing of the Residentes.
     * GET|HEAD /residentes
     */
    public function index(Request $request): JsonResponse
    {
        $residentes = QueryBuilder::for(Residente::class)
            ->allowedFilters([
                'id',
                'primer_nombre',
                'segundo_nombre',
                'tercer_nombre',
                'primer_apellido',
                'segundo_apellido',
                'apellido_casada',
                'dpi',
                'fecha_nacimiento',
                'direccion_id',
                'genero_id',
                AllowedFilter::callback('conServicio', function ($query, $value) {
                    if (filter_var($value, FILTER_VALIDATE_BOOLEAN)) {
                        $query->whereHas('servicios');
                    }
                }),
            ])
            ->allowedSorts([
                'id',
                'primer_nombre',
                'segundo_nombre',
                'tercer_nombre',
                'primer_apellido',
                'segundo_apellido',
                'apellido_casada',
                'dpi',
                'fecha_nacimiento',
                'direccion_id',
                'genero_id'
            ])
            ->allowedIncludes([
                'direccion',
                'genero',
                'telefonos',
                'servicios',
            ])
            ->defaultSort('-id')
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($residentes->toArray(), 'residentes recuperados con éxito.');
    }

    /**
     * Store a newly created Residente in storage.
     * POST /residentes
     */
    public function store(CreateResidenteApiRequest $request): JsonResponse
    {
        try {
            DB::beginTransaction();
            $direccion = $this->guardarDireccion($request->direccion);
            $request->merge([
                'direccion_id' => $direccion->id,
            ]);
            $residente = $this->crearResidente($request);
            $this->guardarNumerosTelefono($residente->id, $request->telefonos);
            DB::commit();
        }
        catch (\Exception $e) {
            DB::rollBack();
            throw new ResidenteExeption("Error al crear residente: " . $e->getMessage());
        }

        return $this->sendResponse($residente->toArray(), 'Residente creado con éxito.');
    }

    /**
     * Display the specified Residente.
     * GET|HEAD /residentes/{id}
     */
    public function show(Residente $residente)
    {
        return $this->sendResponse($residente->toArray(), 'Residente recuperado con éxito.');
    }

    /**
     * Update the specified Residente in storage.
     * PUT/PATCH /residentes/{id}
     */
    public function update(UpdateResidenteApiRequest $request, int $id): JsonResponse
    {
        DB::beginTransaction();

        try {
            $residente = Residente::findOrFail($id);
            $this->actualizarDireccion($residente, $request->direccion);
            $this->actualizarResidente($residente->id, $request);
            $this->sincronizarNumerosTelefono($residente->id, $request->telefonos);
            DB::commit();
            return $this->sendResponse($residente->toArray(), 'Residente actualizado con éxito.');

        } catch (\Exception $e) {
            DB::rollBack();
            throw new ResidenteExeption("Error al actualizar residente: " . $e->getMessage());
        }
    }

    /**
     * Remove the specified Residente from storage.
     * DELETE /residentes/{id}
     */
    public function destroy(Residente $residente): JsonResponse
    {
        $residente->delete();
        return $this->sendResponse(null, 'Residente eliminado con éxito.');
    }

}
