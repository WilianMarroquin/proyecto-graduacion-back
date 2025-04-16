<?php

namespace Database\Seeders\bases;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesPermisosBaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Role::truncate();
        Permission::truncate();

        //Crea los roles por defecto del sistema.
        $rolAdministrador = Role::create(['name' => 'Administrador', 'guard_name' => 'web']);
        $rolEmpleado = Role::create(['name' => 'Empleado', 'guard_name' => 'web']);
        $rolProgramador = Role::create(['name' => 'Programador', 'guard_name' => 'web']);

        // Permisos para administrar las Opciones Del Menu.
        Permission::create(['name' => 'Ver Menu Opciones', 'subject' => 'Menu Opcion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Crear Menu Opciones', 'subject' => 'Menu Opcion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Editar Menu Opciones', 'subject' => 'Menu Opcion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Eliminar Menu Opciones', 'subject' => 'Menu Opcion', 'guard_name' => 'web']);

        // Permisos para los Usuarios.
        Permission::create(['name' => 'Ver usuarios', 'subject' => 'User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Crear usuarios', 'subject' => 'User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Editar usuarios', 'subject' => 'User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Eliminar usuarios', 'subject' => 'User', 'guard_name' => 'web']);

        // Permisos para los Permisos.
        Permission::create(['name' => 'Ver permisos', 'subject' => 'Permission', 'guard_name' => 'web']);
        Permission::create(['name' => 'Crear permisos', 'subject' => 'Permission', 'guard_name' => 'web']);
        Permission::create(['name' => 'Editar permisos', 'subject' => 'Permission', 'guard_name' => 'web']);
        Permission::create(['name' => 'Eliminar permisos', 'subject' => 'Permission', 'guard_name' => 'web']);

        // Permisos para los Roles.
        Permission::create(['name' => 'Ver roles', 'subject' => 'Rol', 'guard_name' => 'web']);
        Permission::create(['name' => 'Crear roles', 'subject' => 'Rol', 'guard_name' => 'web']);
        Permission::create(['name' => 'Editar roles', 'subject' => 'Rol', 'guard_name' => 'web']);
        Permission::create(['name' => 'Eliminar roles', 'subject' => 'Rol', 'guard_name' => 'web']);

        // Permisos para configuraciones
        Permission::create(['name' => 'Ver configuraciones', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Crear configuraciones', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Editar configuraciones', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Eliminar configuraciones', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Actualizar configuraciones generales', 'subject' => 'Configuracion', 'guard_name' => 'web']);

        // Permisos Básicos
        Permission::create(['name' => 'Listar inicio', 'subject' => 'Inicio', 'guard_name' => 'web']);
        Permission::create(['name' => 'Ver menu preferencias', 'subject' => 'Preferencias', 'guard_name' => 'web']);

        // Permisos para modulo usuarios.
        Permission::create(['name' => 'Ver modulo usuarios', 'subject' => 'User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar usuarios', 'subject' => 'User', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar roles', 'subject' => 'Rol', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar permisos', 'subject' => 'Permission', 'guard_name' => 'web']);

        // Permisos para Módulo de configuración.
        Permission::create(['name' => 'Ver modulo configuracion', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar Menu Opciones', 'subject' => 'Menu Opcion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar configuraciones generales', 'subject' => 'Configuracion', 'guard_name' => 'web']);

        // Permisos para Modulo de desarrollo.
        Permission::create(['name' => 'Ver modulo desarrollo', 'subject' => 'Desarrollo', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar configuraciones', 'subject' => 'Configuracion', 'guard_name' => 'web']);
        Permission::create(['name' => 'Listar Componentes', 'subject' => 'Desarrollo', 'guard_name' => 'web']);

        // Asignar todos los permisos al rol Administrador.
        $rolAdministrador->syncPermissions([
            'Ver Menu Opciones',      // Permite ver el menú de opciones
            'Crear Menu Opciones',    // Permite crear opciones en el menú
            'Editar Menu Opciones',   // Permite editar las opciones del menú
            'Eliminar Menu Opciones', // Permite eliminar opciones del menú
            'Ver usuarios',           // Permite ver usuarios
            'Crear usuarios',         // Permite crear usuarios
            'Editar usuarios',        // Permite editar usuarios
            'Eliminar usuarios',      // Permite eliminar usuarios
            'Ver permisos',           // Permite ver permisos
            'Crear permisos',         // Permite crear permisos
            'Editar permisos',        // Permite editar permisos
            'Eliminar permisos',      // Permite eliminar permisos
            'Ver roles',              // Permite ver roles
            'Crear roles',            // Permite crear roles
            'Editar roles',           // Permite editar roles
            'Eliminar roles',         // Permite eliminar roles
            'Listar inicio',          // Solo permisos básicos para la página de inicio
            'Ver menu preferencias',  // Solo permisos básicos para el menú de preferencias
            'Ver modulo usuarios',    // Permite ver el módulo de usuarios
            'Listar usuarios',        // Permite listar usuarios
            'Listar roles',           // Permite listar roles
            'Listar permisos',        // Permite listar permisos
            'Ver modulo configuracion',// Permite ver el módulo de configuración
            'Listar Menu Opciones',   // Permite listar el menú de opciones
            'Listar configuraciones generales', // Permite listar configuraciones
            'Actualizar configuraciones generales', // Permite listar configuraciones
        ]);

        // Asignación de permisos al rol Empleado.
        $rolEmpleado->syncPermissions([
            'Ver menu preferencias', // Solo permisos básicos para el menú de preferencias
            'Listar inicio',          // Solo permisos básicos para la página de inicio
            'Ver Menu Opciones',      // Permite ver el menú de opciones
            'Ver Menu Opciones',      // Permite ver el menú de opciones
        ]);

        // Asignación de permisos al rol Programador.
        $rolProgramador->syncPermissions([
            'Ver menu preferencias', // Solo permisos básicos para el menú de preferencias
            'Ver Menu Opciones',      // Permite ver el menú de opciones
            'Ver modulo desarrollo', // Permite ver el módulo de desarrollo
            'Listar configuraciones' ,        // Permite ver ejemplos
            'Listar Componentes' ,        // Permite ver ejemplos
            'Ver configuraciones' ,        // Permite ver ejemplos
            'Crear configuraciones' ,        // Permite ver ejemplos
            'Editar configuraciones' ,        // Permite ver ejemplos
            'Eliminar configuraciones' ,        // Permite ver ejemplos
        ]);

        // El super admin obtiene todos los permisos por defecto.
        $superAdmin = Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
