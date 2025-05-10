<?php

namespace App\Traits\ServicioAgua;

use App\Exceptions\ServicioAguaException;
use App\Models\ServicioAgua\ServicioAgua;
use App\Models\ServicioAgua\ServicioAguaEstado;

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


}
