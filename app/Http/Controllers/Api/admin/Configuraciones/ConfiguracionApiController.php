<?php

namespace App\Http\Controllers\Api\admin\Configuraciones;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\admin\Configuraciones\CreateConfiguracionApiRequest;
use App\Http\Requests\Api\admin\Configuraciones\UpdateConfiguracionApiRequest;
use App\Models\Configuracion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ConfiguracionApiController
 */
class ConfiguracionApiController extends AppbaseController
{

      /**
  //     * @return array
  //     */
  //    public static function middleware(): array
  //    {
  //        return [
  //            new Middleware('abilities:ver configuraciones', only: ['index', 'show']),
  //            new Middleware('abilities:crear configuraciones', only: ['store']),
  //            new Middleware('abilities:editar configuraciones', only: ['update']),
  //            new Middleware('abilities:eliminar configuraciones', only: ['destroy']),
  //        ];
  //    }

    /**
     * Display a listing of the Configuraciones.
     * GET|HEAD /configuraciones
     */
    public function index(Request $request): JsonResponse
    {
        $configuraciones = QueryBuilder::for(Configuracion::class)
            ->with([])
            ->allowedFilters([
    'key',
    'value',
    'descripcion'
])
            ->allowedSorts([
    'key',
    'value',
    'descripcion'
])
            ->defaultSort('-id') // Ordenar por defecto por fecha descendente
            ->paginate($request->get('per_page', 10));

        return $this->sendResponse($configuraciones->toArray(), 'configuraciones recuperados con éxito.');
    }


    /**
     * Store a newly created Configuracion in storage.
     * POST /configuraciones
     */
    public function store(CreateConfiguracionApiRequest $request): JsonResponse
    {
        $input = $request->all();

        $configuraciones = Configuracion::create($input);

        return $this->sendResponse($configuraciones->toArray(), 'Configuracion creado con éxito.');
    }


    /**
     * Display the specified Configuracion.
     * GET|HEAD /configuraciones/{id}
     */
    public function show(Configuracion $configuracion)
    {
        return $this->sendResponse($configuracion->toArray(), 'Configuracion recuperado con éxito.');
    }



    /**
    * Update the specified Configuracion in storage.
    * PUT/PATCH /configuraciones/{id}
    */
    public function update(UpdateConfiguracionApiRequest $request, $id): JsonResponse
    {
        $configuracion = Configuracion::findOrFail($id);
        $configuracion->update($request->validated());
        return $this->sendResponse($configuracion, 'Configuracion actualizado con éxito.');
    }

    /**
    * Remove the specified Configuracion from storage.
    * DELETE /configuraciones/{id}
    */
    public function destroy(Configuracion $configuracion): JsonResponse
    {
        $configuracion->delete();
        return $this->sendResponse(null, 'Configuracion eliminado con éxito.');
    }

    /**
    * Get columns of the table
    * GET /configuraciones/columns
    */
    public function getColumnas(): JsonResponse
    {

        $columns = Schema::getColumnListing((new Configuracion)->getTable());

        $columnasSinTimesTamps = array_diff($columns, ['id', 'created_at', 'updated_at', 'deleted_at']);

        $nombreDeTabla = (new Configuracion)->getTable();

        $data = [
            'columns' => array_values($columnasSinTimesTamps),
            'nombreDelModelo' => 'Configuracion',
            'nombreDeTabla' => $nombreDeTabla,
            'ruta' => 'api/'.$nombreDeTabla,
        ];

        return $this->sendResponse($data, 'Columnas de la tabla configuraciones recuperadas con éxito.');
    }

}
