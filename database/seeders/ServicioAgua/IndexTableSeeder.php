<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\Comunidad;
use App\Models\Direcciones\ComunidadBarrio;
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
            GenerosTableSeeder::class
        ]);
    }
}
