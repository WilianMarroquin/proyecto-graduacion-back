<?php

namespace Database\Seeders\ServicioAgua;

use Illuminate\Database\Seeder;

class IndexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class="Database\Seeders\ServicioAgua\IndexTableSeeder"
     * @return void
     */
    public function run()
    {
        $this->call([
            Permisos\PermisosComunidadTableSeeder::class,
            ComunidadesTableSeeder::class,
            ComunidadBarriosTableSeeder::class,
            ComunidadBarrioDireccionTableSeeder::class,
            GenerosTableSeeder::class,
            ResidenteTelefonoTiposTableSeeder::class,
            //Catálogo de servicio de agua
            ServicioAguaEstadosTableSeeder::class,
            ServicioAguaBitacoraTipoTransaccionesTableSeeder::class,
        ]);
    }
}
