<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
use Illuminate\Database\Seeder;

class PermisosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create([
            'name' => 'Listar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'Api'
        ]);
        Permission::create([
            'name' => 'Ver Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'Api'
        ]);
        Permission::create([
            'name' => 'Crear Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'Api'
        ]);
        Permission::create([
            'name' => 'Editar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'Api'
        ]);
        Permission::create([
            'name' => 'Eliminar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'Api'
        ]);


    }
}
