<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
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

        Role::create(['name' => 'Super Admin']);
        Role::create(['name' => 'Administrador']);
        Role::create(['name' => 'Empleado']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
