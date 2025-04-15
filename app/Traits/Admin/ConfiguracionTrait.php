<?php

namespace App\Traits\Admin;

use App\Models\Configuracion;

trait ConfiguracionTrait
{
    public function getConfiguracionesGenerales()
    {
        $configuraciones = $this->whereIn('id', [
            Configuracion::NOMBRE_APLICACION,
            Configuracion::EMAIL_APLICACION,
            Configuracion::TELEFONO_APLICACION,
            Configuracion::ESLOGAN,
            Configuracion::FONDO_LOGIN_TEMA_CLARO,
            Configuracion::FONDO_LOGIN_TEMA_OSCURO,
        ])->get();

        $data = [];

        foreach ($configuraciones as $configuracion) {
            if (
                in_array($configuracion->id, [
                    Configuracion::FONDO_LOGIN_TEMA_CLARO,
                    Configuracion::FONDO_LOGIN_TEMA_OSCURO
                ])
            ) {
                // Verifica si tiene media antes de acceder
                if ($configuracion->media->isNotEmpty()) {
                    $data[$configuracion->key] = $configuracion->media->last()->getUrl();
                    continue; // Si se asignó desde media, omitir la asignación por value
                }
            }

            $data[$configuracion->key] = $configuracion->value;
        }

        return $data;
    }

}
