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

    /**
     * Sincronizar (crear, actualizar y eliminar) los teléfonos de un residente.
     *
     * @param int $residente_id
     * @param array $telefonos
     * @return void
     * @throws ResidenteExeption
     */
    public function sincronizarNumerosTelefono(int $residente_id, array $telefonos): void
    {
        try {
            $idsRecibidos = [];

            foreach ($telefonos as $telefono) {
                $registro = ResidenteTelefono::updateOrCreate(
                    [
                        'id' => $telefono['id'] ?? 0,
                        'residente_id' => $residente_id
                    ],
                    [
                        'tipo_id' => $telefono['tipo_id'],
                        'numero' => $telefono['numero'],
                    ]
                );

                $idsRecibidos[] = $registro->id;
            }

            ResidenteTelefono::where('residente_id', $residente_id)
                ->whereNotIn('id', $idsRecibidos)
                ->delete();

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al sincronizar los números de teléfono: " . $e->getMessage());
        }
    }

    /**
     * Actualizar los datos de un residente.
     *
     * @param int $residente_id
     * @param Request $request
     * @return Residente
     * @throws ResidenteExeption
     */
    public function actualizarResidente(int $residente_id, Request $request): Residente
    {
        try {
            $residente = Residente::findOrFail($residente_id);

            $residente->update([
                'primer_nombre' => $request->primer_nombre,
                'segundo_nombre' => $request->segundo_nombre,
                'tercer_nombre' => $request->tercer_nombre,
                'primer_apellido' => $request->primer_apellido,
                'segundo_apellido' => $request->segundo_apellido,
                'apellido_casada' => $request->apellido_casada,
                'dpi' => $request->dpi,
                'fecha_nacimiento' => $request->fecha_nacimiento,
                'direccion_id' => $request->direccion_id,
                'genero_id' => $request->genero_id,
            ]);

            return $residente;

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al actualizar el residente: " . $e->getMessage());
        }
    }

    /**
     * Actualizar la dirección de un residente.
     *
     * @param Residente $residente
     * @param array $direccion
     * @return ComunidadBarrioDireccion|null
     * @throws ResidenteExeption
     */
    public function actualizarDireccion(Residente $residente, array $direccion)
    {
        try {
            $direccionModel = $residente->direccion;

            if (!$direccionModel) {
                throw new ResidenteExeption("El residente no tiene una dirección asignada para actualizar.");
            }

            $direccionModel->update([
                'direccion' => $direccion['direccion'],
                'barrio_id' => $direccion['barrio_id'],
            ]);

            return $direccionModel;

        } catch (\Exception $e) {
            throw new ResidenteExeption("Error al actualizar la dirección: " . $e->getMessage());
        }
    }

}

