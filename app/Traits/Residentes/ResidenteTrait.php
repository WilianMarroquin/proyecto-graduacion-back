<?php

namespace App\Traits\Residentes;

use App\Exceptions\ResidenteExeption;
use App\Models\Direcciones\ComunidadBarrio;
use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\Residentes\Residente;
use App\Models\Residentes\ResidenteTelefono;
use Illuminate\Http\Request;

trait ResidenteTrait
{
    /**
     * Guardar los números de teléfono del residente.
     *
     * @param int $residente_id
     * @param array $telefonos
     * @return void
     * @throws ResidenteExeption
     */
    public function guardarNumerosTelefono(int $residente_id, array $telefonos): void
    {
        try {

            foreach ($telefonos as $index => $telefono) {
                ResidenteTelefono::create([
                    'residente_id' => $residente_id,
                    'tipo_id' => $telefono['tipo_id'],
                    'numero' => $telefono['numero'],
                ]);
            }

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al guardar los números de teléfono: " . $e->getMessage());
        }
    }

    /**
     * Crear un nuevo residente.
     *
     * @param Request $request
     * @return Residente
     * @throws ResidenteExeption
     */
    public function crearResidente(Request $request)
    {
        try {
            $residente = Residente::create([
                'primer_nombre' => $request->primer_nombre,
                'segundo_nombre' => $request->segundo_nombre,
                'tercer_nombre' => $request->tercer_nombre,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'apellido_casada' => $request->apellido_casada,
                'dpi' => $request->dpi,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'direccion_id' => $request->direccion_id,
                'genero_id' => $request->genero_id
            ]);

            return $residente;

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al crear residente: " . $e->getMessage());
        }

    }

    /**
     * Guardar la dirección del residente.
     *
     * @param array $direccion
     * @return ComunidadBarrioDireccion
     * @throws ResidenteExeption
     */
    public function guardarDireccion($direccion)
    {
        try {
            $barrio = ComunidadBarrio::find($direccion['barrio_id']);

            $direccion = $barrio->direcciones()->create([
                'direccion' => $direccion['direccion'],
            ]);

            return $direccion;

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al guardar la dirección: " . $e->getMessage());
        }

    }
}

