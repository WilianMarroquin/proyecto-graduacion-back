<?php

namespace Database\Seeders;

use Database\Seeders\bases\IndexTableSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $this->call([
            IndexTableSeeder::class,
            \Database\Seeders\ServicioAgua\IndexTableSeeder::class
        ]);

    }
}
