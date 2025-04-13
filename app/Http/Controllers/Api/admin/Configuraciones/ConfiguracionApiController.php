<?php

namespace App\Http\Controllers\Api\admin\Configuraciones;

use App\Http\Controllers\AppBaseController;
use App\Http\Requests\Api\admin\Configuraciones\CreateConfiguracionApiRequest;
use App\Http\Requests\Api\admin\Configuraciones\UpdateConfiguracionApiRequest;
use App\Models\Configuracion;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\QueryBuilder;

/**
 * Class ConfiguracionApiController
 */
class ConfiguracionApiController extends AppbaseController
{

    /**
     * //     * @return array
     * //     */
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
     * @param  Request  $request
     * @return JsonResponse
     */
    public function guardarGenerales(Request $request)
    {

        $configuraciones = $request->all();

        foreach ($configuraciones as $configuracionRequest) {
            $configuracion = Configuracion::where('key', $configuracionRequest['key'])->first();
            if ($configuracion) {
                $configuracion->update([
                    'value' => $configuracionRequest['value'],
                    'descripcion' => $configuracionRequest['descripcion'],
                ]);
            } else {
                Configuracion::create([
                    'key' => $configuracionRequest['key'],
                    'value' => $configuracionRequest['value'],
                    'descripcion' => $configuracionRequest['descripcion'],
                ]);
            }
        }

        return $this->sendResponse($configuraciones, 'Configuraciones generales guardadas con éxito.');

    }

    /**
     * @return JsonResponse
     */
    public function getConfiguracionesGenerales()
    {
        $configuraciones = Configuracion::whereIn('id', [
            Configuracion::NOMBRE_APLICACION,
            Configuracion::EMAIL_APLICACION,
            Configuracion::TELEFONO_APLICACION,
            Configuracion::FONDO_LOGIN_TEMA_CLARO,
            Configuracion::FONDO_LOGIN_TEMA_OSCURO,
        ])->get();

        $configuracionesGenerales = [
            'nombre_aplicacion' => $configuraciones->where('id', Configuracion::NOMBRE_APLICACION)->first()->value,
            'email_aplicacion' => $configuraciones->where('id', Configuracion::EMAIL_APLICACION)->first()->value,
            'telefono_aplicacion' => $configuraciones->where('id', Configuracion::TELEFONO_APLICACION)->first()->value,
            'fondo_login_tema_claro' => $configuraciones->where('id', Configuracion::FONDO_LOGIN_TEMA_CLARO)->first(),
            'fondo_login_tema_oscuro' => $configuraciones->where('id', Configuracion::FONDO_LOGIN_TEMA_OSCURO)->first(),
        ];


        return $this->sendResponse($configuracionesGenerales, 'Configuraciones generales recuperadas con éxito.');

    }

}
