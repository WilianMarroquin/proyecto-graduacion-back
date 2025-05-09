<?php

namespace Database\Seeders\ServicioAgua\Permisos;

use Illuminate\Database\Seeder;

class IndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class="Database\Seeders\ServicioAgua\Permisos\IndexTableSeeder"
     */
    public function run(): void
    {
        $this->call([
            PermisosComunidadTableSeeder::class,
            PermisosComunidadBarriosTableSeeder::class,
            PermisosComunidadBarrioDireccionesTableSeeder::class,
            PermisosGenerosTableSeeder::class,
            PermisosResidenteTelefonosTableSeeder::class,
            PermisosResidentesTableSeeder::class,
            PermisosResidenteTelefonoTiposTableSeeder::class,
            //Permisos de servicios de agua.
            PermisosServicioAguaEstadosTableSeeder::class,
        ]);
    }
}
