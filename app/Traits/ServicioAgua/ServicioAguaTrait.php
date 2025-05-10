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

    public function crearServicioAgua(int $residenteId, ComunidadBarrioDireccion $direccion)
    {
        try {
            $servicioAgua = ServicioAgua::create([
                'correlativo' => $this->generarCorrelativo($direccion),
                'residente_id' => $residenteId,
                'estado_id' => ServicioAguaEstado::ACTIVA,
            ]);
            return $servicioAgua;
        } catch (\Exception $e) {
            throw new ServicioAguaException("Error al crear el servicio de Agua: " . $e->getMessage());
        }
    }
    public function generarCorrelativo(ComunidadBarrioDireccion $direccion)
    {
        $nombreComunidad = $direccion->barrio->comunidad->nombre;

        $palabras = explode(' ', trim($nombreComunidad));
        if (strtolower($palabras[0]) === 'el' && count($palabras) > 1) {
            $baseComunidad = substr($palabras[1], 0, 3);
        } else {
            $baseComunidad = substr($palabras[0], 0, 3);
        }

        $baseComunidad = ucfirst(strtolower($baseComunidad));
        $anioActual = date('Y');
        $prefijo = $baseComunidad . '-' . $anioActual . '-';

        $ultimoServicioAgua = ServicioAgua::where('correlativo', 'like', $prefijo . '%')
            ->orderBy('id', 'desc')
            ->first();

        if ($ultimoServicioAgua) {
            $ultimoCorrelativo = (int) str_replace($prefijo, '', $ultimoServicioAgua->correlativo);
            $nuevoNumero = str_pad($ultimoCorrelativo + 1, 4, '0', STR_PAD_LEFT);
        } else {
            $nuevoNumero = '0001';
        }

        return $prefijo . $nuevoNumero;
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
