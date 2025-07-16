<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\ServicioAgua\ServicioAguaEstado;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioAguaEstadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        ServicioAguaEstado::truncate();

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Activo',
        ]);

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Suspendido',
        ]);

        ServicioAguaEstado::firstOrCreate([
            'nombre' => 'Inactivo',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
