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
            'key' => 'Nombre Aplicacion',
            'value' => 'Mi App',
            'descripcion' => 'Nombre de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'Email Aplicacion',
            'value' => 'example@gmail.com',
            'descripcion' => 'Email de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'Telefono Aplicacion',
            'value' => '12345678',
            'descripcion' => 'Telefono de la empresa'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'Fondo Login Tema Claro',
            'value' => '12345678',
            'descripcion' => 'Imagen de fondo del login tema claro'
        ]);

        Configuracion::firstOrCreate([
            'key' => 'Fondo Login Tema Oscuro',
            'value' => '12345678',
            'descripcion' => 'Imagen de fondo del login tema oscuro'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
