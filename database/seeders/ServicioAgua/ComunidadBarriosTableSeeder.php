<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\ComunidadBarrio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunidadBarriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        ComunidadBarrio::truncate();

        ComunidadBarrio::create([
            'nombre' => 'Las Pilas',
            'comunidad_id' => 1
        ]);
        ComunidadBarrio::create([
            'nombre' => 'Las Joyas',
            'comunidad_id' => 1
        ]);
        ComunidadBarrio::create([
            'nombre' => 'El centro',
            'comunidad_id' => 1
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
