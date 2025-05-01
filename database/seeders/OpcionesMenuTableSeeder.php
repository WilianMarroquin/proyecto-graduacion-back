<?php

namespace Database\Seeders;

use App\Models\Direcciones\Comunidad;
use App\Models\MenuOpcion;
use Database\Seeders\ServicioAgua\ComunidadesTableSeeder;
use Database\Seeders\ServicioAgua\Permisos;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpcionesMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class="Database\Seeders\ServicioAgua\IndexTableSeeder"
     * @return void
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        MenuOpcion::truncate();

        MenuOpcion::create([
            "id" => 1,
            "titulo" => "Inicio",
            "icono" => "ri-home-8-line",
            "ruta" => "index",
            "orden" => 0,
            "action" => "Listar Inicio",
            "subject" => "Inicio",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 2,
            "titulo" => null,
            "icono" => null,
            "ruta" => null,
            "orden" => 1,
            "titulo_seccion" => "Administración",
            "action" => "Ver Modulo Usuarios",
            "subject" => "User",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 3,
            "titulo" => "Modulo Usuarios",
            "icono" => "ri-group-line",
            "ruta" => null,
            "orden" => 2,
            "action" => "Ver Modulo Usuarios",
            "subject" => "User",
            "parent_id" => null
        ]);

// Submenús del Modulo Usuarios
        MenuOpcion::create([
            "id" => 4,
            "titulo" => "Usuarios",
            "icono" => "ri-list-ordered-2",
            "ruta" => "admin-modulo-usuarios-usuarios",
            "orden" => 3,
            "action" => "Listar Usuarios",
            "subject" => "User",
            "parent_id" => 3
        ]);

        MenuOpcion::create([
            "id" => 5,
            "titulo" => "Roles",
            "icono" => "ri-folder-shield-2-line",
            "ruta" => "admin-modulo-usuarios-roles",
            "orden" => 4,
            "action" => "Listar Roles",
            "subject" => "Rol",
            "parent_id" => 3
        ]);

        MenuOpcion::create([
            "id" => 6,
            "titulo" => "Permisos",
            "icono" => "ri-file-shield-2-fill",
            "ruta" => "admin-modulo-usuarios-permisos",
            "orden" => 5,
            "action" => "Listar Permisos",
            "subject" => "Permission",
            "parent_id" => 3
        ]);

        MenuOpcion::create([
            "id" => 7,
            "titulo" => "Estados de usuarios",
            "icono" => "ri-folder-user-fill",
            "ruta" => "admin-modulo-usuarios-usuario-estados",
            "orden" => 6,
            "action" => "Listar Usuario Estados",
            "subject" => "UserEstado",
            "parent_id" => 3
        ]);

        MenuOpcion::create([
            "id" => 8,
            "titulo" => "Catálogos",
            "icono" => "ri-folder-user-fill",
            "ruta" => null,
            "orden" => 7,
            "action" => "Listar Catalogos",
            "subject" => "Catalogos",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 9,
            "titulo" => "Comunidades",
            "icono" => "ri-folder-user-fill",
            "ruta" => 'catalogos-comunidades',
            "orden" => 8,
            "action" => "Listar Comunidades",
            "subject" => "Comunidades",
            "parent_id" => 8
        ]);

        MenuOpcion::create([
            "id" => 10,
            "titulo" => "Configuraciones",
            "icono" => "ri-folder-settings-fill",
            "ruta" => null,
            "orden" => 9,
            "action" => "Ver Modulo Configuracion",
            "subject" => "Configuracion",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 11,
            "titulo" => "Opciones Menu",
            "icono" => "ri-apps-2-add-line",
            "ruta" => "admin-configuraciones-menu",
            "orden" => 10,
            "action" => "Listar Menu Opciones",
            "subject" => "Menu Opcion",
            "parent_id" => 10
        ]);

        MenuOpcion::create([
            "id" => 12,
            "titulo" => "Generales",
            "icono" => "ri-settings-3-fill",
            "ruta" => "admin-configuraciones-generales",
            "orden" => 11,
            "action" => "Listar Configuraciones Generales",
            "subject" => "Configuracion",
            "parent_id" => 10
        ]);

        MenuOpcion::create([
            "id" => 13,
            "titulo" => null,
            "icono" => null,
            "ruta" => null,
            "orden" => 12,
            "titulo_seccion" => "Modulo Programación",
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 14,
            "titulo" => "Developers",
            "icono" => "ri-tools-fill",
            "ruta" => "second-page",
            "orden" => 13,
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 15,
            "titulo" => "Configuraciones",
            "icono" => "ri-settings-5-fill",
            "ruta" => "dev-configuraciones",
            "orden" => 14,
            "action" => "Listar Configuraciones",
            "subject" => "Configuracion",
            "parent_id" => 14
        ]);

        MenuOpcion::create([
            "id" => 16,
            "titulo" => "Componentes",
            "icono" => "ri-code-box-line",
            "ruta" => "dev-componentes",
            "orden" => 15,
            "action" => "Listar Componentes",
            "subject" => "Desarrollo",
            "parent_id" => 14
        ]);



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
