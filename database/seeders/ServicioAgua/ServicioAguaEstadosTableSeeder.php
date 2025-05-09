<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\ServicioAgua\ServicioAguaEstado;
use Illuminate\Database\Seeder;

class ServicioAguaEstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Activo',
        ]);

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Suspendido',
        ]);

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Inactivo',
        ]);
    }
}
