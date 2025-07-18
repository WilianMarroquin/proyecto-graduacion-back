<?php

namespace Database\Seeders;

use App\Models\MenuOpcion;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OpcionesMenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed OpcionesMenuTableSeeder
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
            "titulo" => "Direcciones",
            "icono" => "ri-folder-open-fill",
            "ruta" => null,
            "orden" => 7,
            "action" => "Listar Catalogos",
            "subject" => "Catalogos",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 9,
            "titulo" => "Comunidades",
            "icono" => "ri-draft-line",
            "ruta" => 'catalogos-comunidades',
            "orden" => 8,
            "action" => "Listar Comunidades",
            "subject" => "Comunidades",
            "parent_id" => 8
        ]);

        MenuOpcion::create([
            "id" => 10,
            "titulo" => "Barrios",
            "icono" => "ri-draft-line",
            "ruta" => 'catalogos-comunidad-barrios',
            "orden" => 9,
            "action" => "Listar Comunidad Barrios",
            "subject" => "ComunidadBarrio",
            "parent_id" => 8
        ]);

        MenuOpcion::create([
            "id" => 11,
            "titulo" => "Direcciones",
            "icono" => "ri-draft-line",
            "ruta" => 'catalogos-comunidad-barrio-direcciones',
            "orden" => 10,
            "action" => "Listar Comunidad Barrio Direcciones",
            "subject" => "ComunidadBarrioDireccion",
            "parent_id" => 8
        ]);

        MenuOpcion::create([
            "id" => 12,
            "titulo" => "Configuraciones",
            "icono" => "ri-folder-settings-fill",
            "ruta" => null,
            "orden" => 11,
            "action" => "Ver Modulo Configuracion",
            "subject" => "Configuracion",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 13,
            "titulo" => "Opciones Menu",
            "icono" => "ri-apps-2-add-line",
            "ruta" => "admin-configuraciones-menu",
            "orden" => 12,
            "action" => "Listar Menu Opciones",
            "subject" => "Menu Opcion",
            "parent_id" => 12
        ]);

        MenuOpcion::create([
            "id" => 14,
            "titulo" => "Generales",
            "icono" => "ri-settings-3-fill",
            "ruta" => "admin-configuraciones-generales",
            "orden" => 13,
            "action" => "Listar Configuraciones Generales",
            "subject" => "Configuracion",
            "parent_id" => 12
        ]);

        MenuOpcion::create([
            "id" => 15,
            "titulo" => null,
            "titulo_seccion" => 'Servicio Agua',
            "icono" => null,
            "ruta" => null,
            "orden" => 14,
            "action" => "Ver Modulo Residentes",
            "subject" => "Residente",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 16,
            "titulo" => "Residentes",
            "icono" => "ri-team-fill",
            "ruta" => null,
            "orden" => 15,
            "action" => "Ver Modulo Residentes",
            "subject" => "Residente",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 17,
            "titulo" => "Listado Residentes",
            "icono" => "ri-menu-2-fill",
            "ruta" => 'residentes',
            "orden" => 16,
            "action" => "Listar Residentes",
            "subject" => "Residente",
            "parent_id" => 16
        ]);

        MenuOpcion::create([
            "id" => 18,
            "titulo" => "Catálogos",
            "icono" => "ri-folder-open-fill",
            "ruta" => null,
            "orden" => 17,
            "action" => "Ver Catalogos Residentes",
            "subject" => "Residente",
            "parent_id" => 16
        ]);

        MenuOpcion::create([
            "id" => 19,
            "titulo" => "Teléfonos",
            "icono" => 'ri-draft-line',
            "ruta" => 'residentes-catalogos-telefonos',
            "orden" => 18,
            "action" => "Listar Residente Telefonos",
            "subject" => "ResidenteTelefono",
            "parent_id" => 18
        ]);

        MenuOpcion::create([
            "id" => 20,
            "titulo" => "Tipos de Teléfonos",
            "icono" => 'ri-draft-line',
            "ruta" => 'residentes-catalogos-telefono-tipos',
            "orden" => 19,
            "action" => "Listar Residente Telefono Tipos",
            "subject" => "ResidenteTelefonoTipo",
            "parent_id" => 18
        ]);

        MenuOpcion::create([
            "id" => 21,
            "titulo" => "Géneros",
            "icono" => 'ri-draft-line',
            "ruta" => 'residentes-catalogos-generos',
            "orden" => 20,
            "action" => "Listar Generos",
            "subject" => "Genero",
            "parent_id" => 18
        ]);

        MenuOpcion::create([
            "id" => 22,
            "titulo" => "Servicios de Agua",
            "icono" => "ri-drop-line",
            "ruta" => null,
            "orden" => 21,
            "action" => "Pendiente",
            "subject" => "Pendiente",
            "parent_id" => null,
        ]);

        MenuOpcion::create([
            "id" => 23,
            "titulo" => 'Servicios',
            "icono" => 'ri-newspaper-line',
            "ruta" => 'servicio-agua',
            "orden" => 22,
            "titulo_seccion" => null,
            "action" => "Pendiente",
            "subject" => "Pendiente",
            "parent_id" => 22
        ]);

        MenuOpcion::create([
            "id" => 24,
            "titulo" => 'Catálogos',
            "icono" => "ri-folder-open-fill",
            "ruta" => null,
            "orden" => 23,
            "titulo_seccion" => null,
            "action" => "Pendiente",
            "subject" => "Pendiente",
            "parent_id" => 22
        ]);

        MenuOpcion::create([
            "id" => 25,
            "titulo" => 'Estados',
            "icono" => 'ri-draft-line',
            "ruta" => 'servicio-agua-catalogos-estados',
            "orden" => 24,
            "titulo_seccion" => null,
            "action" => "Listar Servicio Agua Estados",
            "subject" => "ServicioAguaEstado",
            "parent_id" => 24
        ]);

        MenuOpcion::create([
            "id" => 26,
            "titulo" => 'Tipo Transacciónes',
            "icono" => 'ri-draft-line',
            "ruta" => 'servicio-agua-catalogos-bitacora-tipo-transacciones',
            "orden" => 25,
            "titulo_seccion" => null,
            "action" => "Listar Servicio Agua Bitacora Tipo Transacciones",
            "subject" => "ServicioAguaBitacoraTipoTransaccion",
            "parent_id" => 24
        ]);

        MenuOpcion::create([
            "id" => 27,
            "titulo" => null,
            "titulo_seccion" => 'Modulo Dev',
            "icono" => null,
            "ruta" => null,
            "orden" => 26,
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 28,
            "titulo" => "Developers",
            "icono" => "ri-tools-fill",
            "ruta" => "second-page",
            "orden" => 27,
            "action" => "Ver Modulo Desarrollo",
            "subject" => "Desarrollo",
            "parent_id" => null
        ]);

        MenuOpcion::create([
            "id" => 29,
            "titulo" => "Configuraciones",
            "icono" => "ri-settings-5-fill",
            "ruta" => "dev-configuraciones",
            "orden" => 28,
            "action" => "Listar Configuraciones",
            "subject" => "Configuracion",
            "parent_id" => 28
        ]);

        MenuOpcion::create([
            "id" => 30,
            "titulo" => "Componentes",
            "icono" => "ri-code-box-line",
            "ruta" => "dev-componentes",
            "orden" => 29,
            "action" => "Listar Componentes",
            "subject" => "Desarrollo",
            "parent_id" => 28
        ]);



        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
