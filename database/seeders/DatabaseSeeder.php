<?php

namespace Database\Seeders;

use Database\Seeders\bases\MenuOpcionesTableSeeder;
use Database\Seeders\bases\PermisosTableSeeder;
use Database\Seeders\bases\RolesTableSeeder;
use Database\Seeders\bases\UserSeeder;
use Illuminate\Database\Seeder;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call(UserSeeder::class);
        $this->call(PermisosTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(MenuOpcionesTableSeeder::class);

    }
}
