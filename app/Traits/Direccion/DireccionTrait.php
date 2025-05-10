<?php

namespace App\Traits\Direccion;

use App\Exceptions\DireccionException;
use App\Models\Direcciones\ComunidadBarrio;

trait DireccionTrait
{
    public function crearDireccion($direccion)
    {
        try {
            $barrio = ComunidadBarrio::find($direccion['barrio_id']);

            $direccion = $barrio->direcciones()->create([
                'direccion' => $direccion['direccion'],
            ]);

            return $direccion;

        } catch (\Exception $e) {
            throw new DireccionException("Error al guardar la dirección: " . $e->getMessage());
        }

    }
}
