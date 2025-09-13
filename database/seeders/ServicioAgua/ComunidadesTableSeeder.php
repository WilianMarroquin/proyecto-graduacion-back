<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Direcciones\Comunidad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComunidadesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        Comunidad::truncate();

        Comunidad::firstOrCreate([
            'nombre' => 'El Naranjo',
        ]);


        if (DB::getDriverName() !== 'sqlite') {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}
