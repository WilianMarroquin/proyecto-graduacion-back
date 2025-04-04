<?php

namespace Database\Seeders\bases;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Permission::truncate();

        //Permisos para administrar las Opciones Del Menu.
        Permission::create([
            'name' => 'Listar Menu Opciones',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver Menu Opciones',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Crear Menu Opciones',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar Menu Opciones',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar Menu Opciones',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);

        //Permisos para los Usuarios.
        Permission::create([
            'name' => 'Ver modulo usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Listar usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Crear usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar usuarios',
            'subject' => 'User',
            'guard_name' => 'web'
        ]);

        //Permisos para los Permisos.
        Permission::create([
            'name' => 'Listar permisos',
            'subject' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver permisos',
            'subject' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Crear permisos',
            'subject' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar permisos',
            'subject' => 'Permission',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar permisos',
            'subject' => 'Permission',
            'guard_name' => 'web'
        ]);

        //Permisos para los Roles.
        Permission::create([
            'name' => 'Listar roles',
            'subject' => 'Rol',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver roles',
            'subject' => 'Rol',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Crear roles',
            'subject' => 'Rol',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar roles',
            'subject' => 'Rol',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar roles',
            'subject' => 'Rol',
            'guard_name' => 'web'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
