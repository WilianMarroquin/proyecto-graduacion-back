<?php

namespace Database\Seeders\bases;

use Illuminate\Database\Seeder;

class IndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $this->call([
//             UserTableSeeder::class,
            PermisosTableSeeder::class,
//             UserRoleTableSeeder::class,
//             RoleTableSeeder::class,
        ]);

    }
}
