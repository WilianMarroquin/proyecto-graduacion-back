<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\Comunidad;
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
        ]);
    }
}
