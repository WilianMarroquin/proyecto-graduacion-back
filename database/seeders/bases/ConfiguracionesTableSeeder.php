<?php

namespace Database\Seeders\bases;

use App\Models\Configuracion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Configuracion::truncate();

        Configuracion::firstOrCreate([
            'key' => 'nombre_aplicacion',
            'value' => 'Mi App',
            'descripcion' => 'Nombre de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'email_aplicacion',
            'value' => 'example@gmail.com',
            'descripcion' => 'Email de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'telefono_aplicacion',
            'value' => '12345678',
            'descripcion' => 'Telefono de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'eslogan_aplicacion',
            'value' => 'Mi App es genial',
            'descripcion' => 'Eslogan de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'fondo_login_tema_claro',
            'value' => '12345678',
            'descripcion' => 'Imagen de fondo del login tema claro'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'fondo_login_tema_oscuro',
            'value' => '12345678',
            'descripcion' => 'Imagen de fondo del login tema oscuro'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
