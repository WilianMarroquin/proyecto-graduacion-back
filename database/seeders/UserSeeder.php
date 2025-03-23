<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::firstOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'primer_nombre' => 'Admin',
                'segundo_nombre' => '',
                'primer_apellido' => 'Admin',
                'segundo_apellido' => '',
                'usuario' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('12345'),
            ]);
    }
}
