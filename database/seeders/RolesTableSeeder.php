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

        Role::create(['name' => 'Super Admin', 'guard_name' => 'web']);
        Role::create(['name' => 'Administrador', 'guard_name' => 'web']);
        Role::create(['name' => 'Empleado', 'guard_name' => 'web']);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
