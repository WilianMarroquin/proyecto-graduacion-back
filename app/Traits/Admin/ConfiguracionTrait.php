<?php

namespace App\Traits\Admin;

use App\Models\Configuracion;

trait ConfiguracionTrait
{
    public function getConfiguracionesGenerales()
    {
        $configuraciones = $this->whereIn('key', [
            Configuracion::NOMBRE_APLICACION,
            Configuracion::EMAIL_APLICACION,
            Configuracion::TELEFONO_APLICACION,
            Configuracion::ESLOGAN,
            Configuracion::FONDO_LOGIN_TEMA_CLARO,
            Configuracion::FONDO_LOGIN_TEMA_OSCURO,
        ])->get();

        $data = [];

        foreach ($configuraciones as $configuracion) {
            if($configuracion->key == Configuracion::FONDO_LOGIN_TEMA_CLARO || $configuracion->key == Configuracion::FONDO_LOGIN_TEMA_OSCURO) {
                $data[$configuracion->key] = $configuracion->getFirstMediaUrl($configuracion->key);
            }
            $data[$configuracion->key] = $configuracion->value;
        }

        return $data;

    }
}
