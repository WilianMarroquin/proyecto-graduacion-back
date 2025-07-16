<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Residentes\ResidenteTelefonoTipo;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class
ResidenteTelefonoTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        ResidenteTelefonoTipo::truncate();

        ResidenteTelefonoTipo::create([
            'nombre' => 'Casa',
        ]);
        ResidenteTelefonoTipo::create([
            'nombre' => 'Celular',
        ]);
        ResidenteTelefonoTipo::create([
            'nombre' => 'Trabajo',
        ]);
        ResidenteTelefonoTipo::create([
            'nombre' => 'Otro',
        ]);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
