<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\ServicioAgua\ServicioAguaBitacoraTipoTransaccion;
use Illuminate\Database\Seeder;

class ServicioAguaBitacoraTipoTransaccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ServicioAguaBitacoraTipoTransaccion::firstOrCreate([
            'nombre' => 'Compra',
        ]);

        ServicioAguaBitacoraTipoTransaccion::firstOrCreate([
            'nombre' => 'Herencia',
        ]);

        ServicioAguaBitacoraTipoTransaccion::firstOrCreate([
            'nombre' => 'Donación',
        ]);

        ServicioAguaBitacoraTipoTransaccion::firstOrCreate([
            'nombre' => 'Trabajo Comunitario',
        ]);
    }
}
