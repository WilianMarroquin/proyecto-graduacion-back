<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\User;
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

        Permission::create([
            'name' => 'Listar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Ver Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Crear Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Editar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);
        Permission::create([
            'name' => 'Eliminar Menu Opcion',
            'subject' => 'Menu Opcion',
            'guard_name' => 'web'
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');



    }
}
