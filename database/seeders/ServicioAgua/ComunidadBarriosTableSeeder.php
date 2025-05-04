<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\ComunidadBarrio;
use Illuminate\Database\Seeder;

class ComunidadBarriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
    }
}
