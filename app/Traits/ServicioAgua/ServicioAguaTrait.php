<?php

namespace App\Traits\ServicioAgua;

use App\Exceptions\ServicioAguaException;
use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\ServicioAgua\ServicioAgua;
use App\Models\ServicioAgua\ServicioAguaEstado;
use Carbon\Carbon;
use Illuminate\Http\Request;

trait ServicioAguaTrait
{

    public function crearServicioAgua(int $residenteId)
    {
        try {
            $servicioAgua = ServicioAgua::create([
                'correlativo' => $this->generarCorrelativo(),
                'residente_id' => $residenteId,
                'estado_id' => ServicioAguaEstado::ACTIVA,
            ]);
            return $servicioAgua;
        } catch (\Exception $e) {
            throw new ServicioAguaException("Error al crear el servicio de Agua: " . $e->getMessage());
        }
    }
    public function generarCorrelativo()
    {
        $ultimoServicioAgua = ServicioAgua::orderBy('id', 'desc')->first();

        $anioActual = date('Y');

        if (!empty($ultimoServicioAgua)) {
            $ultimoCorrelativo = (int) str_replace($anioActual . '-', '', $ultimoServicioAgua->correlativo);
            return $anioActual . '-' . str_pad($ultimoCorrelativo + 1, 4, '0', STR_PAD_LEFT);
        } else {
            return $anioActual . '-0001';
        }
    }

    public function guardarBitacoraCreacionServicio(ServicioAgua $servicioAgua, Request $request, ComunidadBarrioDireccion $direccion)
    {

        $servicioAgua->bitacoras()->create([
            'fecha_registro' => Carbon::now(),
            'residente_id' => $request->residente_id,
            'servicio_agua_id' => $servicioAgua->id,
            'transaccion_id' => $request->tipo_adquisicion_id,
            'direccion_id' => $direccion->id,
            'user_transacciona_id' => $request->user()->id,
            'observaciones' => $request->observaciones ?? null
        ]);

    }


}
