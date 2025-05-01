<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\Comunidad;
use Illuminate\Database\Seeder;

class ComunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Comunidad::firstOrCreate([
            'nombre' => 'El Naranjo',
        ]);
    }
}
