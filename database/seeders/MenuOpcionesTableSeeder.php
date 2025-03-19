<?php

namespace Database\Seeders;

use App\Models\MenuOpcion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MenuOpcionesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        MenuOpcion::truncate();

        MenuOpcion::create([
            "titulo" => "Inicio",
            "icono" => "ri-home-8-line",
            "ruta" => "index",
            "orden" => 0,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "titulo" => null,
            "icono" => null,
            "ruta" => null,
            'titulo_seccion' => 'Administración',
            "orden" => 1,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "titulo" => "Developers",
            "icono" => "ri-tools-fill",
            "ruta" => "second-page",
            "orden" => 8,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "titulo" => "Configuraciones",
            "icono" => "ri-settings-5-fill",
            "ruta" => "second-page",
            "orden" => 9,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 3
        ]);

        MenuOpcion::create([
            "titulo" => "Configuraciones",
            "icono" => "ri-settings-5-fill",
            "ruta" => null,
            "orden" => 6,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "titulo" => "Opciones Menu",
            "icono" => "ri-apps-2-add-line",
            "ruta" => "admin-menu",
            "orden" => 7,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 5
        ]);

        MenuOpcion::create([
            "titulo" => "Modulo Usuarios",
            "icono" => "ri-group-line",
            "ruta" => "second-page",
            "orden" => 2,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "titulo" => "Usuarios",
            "icono" => "ri-list-ordered-2",
            "ruta" => "second-page",
            "orden" => 3,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 7
        ]);

        MenuOpcion::create([
            "titulo" => "Roles",
            "icono" => "ri-folder-shield-2-line",
            "ruta" => "second-page",
            "orden" => 4,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 7
        ]);

        MenuOpcion::create([
            "titulo" => "Permisos",
            "icono" => "ri-file-shield-2-fill",
            "ruta" => "permisos",
            "orden" => 5,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 7
        ]);

        MenuOpcion::create([
            "titulo" => "General",
            "icono" => "ri-multi-image-fill",
            "ruta" => "second-page",
            "orden" => 10,
            "action" => 'Listar Menu Opcion',
            "subject" => 'Menu Opcion',
            "parent_id" => 5
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
