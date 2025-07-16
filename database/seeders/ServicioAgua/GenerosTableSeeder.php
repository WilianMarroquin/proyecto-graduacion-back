<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Residentes\Genero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenerosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Genero::truncate();

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

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
