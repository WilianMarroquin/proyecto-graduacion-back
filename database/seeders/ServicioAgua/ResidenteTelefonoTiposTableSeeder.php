<?php

namespace Database\Seeders\ServicioAgua;

use App\Models\Residentes\ResidenteTelefonoTipo;
use Illuminate\Database\Seeder;

class ResidenteTelefonoTiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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

    }
}
