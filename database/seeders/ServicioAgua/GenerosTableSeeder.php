<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Residentes\Genero;
use Illuminate\Database\Seeder;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genero::create([
            'nombre' => 'Masculino',
            'descripcion' => 'Hombre',
            'estado' => 1,
        ]);

        Genero::create([
            'nombre' => 'Femenino',
            'descripcion' => 'Mujer',
            'estado' => 1,
        ]);

    }
}
