<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\ServicioAgua\ServicioAguaBitacoraTipoTransaccion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioAguaBitacoraTipoTransaccionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        ServicioAguaBitacoraTipoTransaccion::truncate();

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

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }

    }
}
