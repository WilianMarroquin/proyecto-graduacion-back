<?php

use App\Models\User;
use App\Models\UserEstado;
use Illuminate\Support\Facades\Hash;

beforeEach(function () {
    //Llena la base de datos con datos de prueba antes de cada test
    $this->seed(\Database\Seeders\DatabaseSeeder::class);
});

test('Login', function () {

    //Traemos al usuario por defecto creado en el seeder
    $user = User::find(1);

    //Intentar loguearse
    $response = $this->postJson('/api/login', [
        'usuario' => 'Admin',
        'password' => '12345',
    ]);

    //Verificar que la respuesta es 204 no content
    $response->assertNoContent();

    //Luego de validar la respuesta, verificar que el usuario está autenticado
    $this->assertAuthenticatedAs($user);
});

test('Login Incorrecto', function () {

    //Intentar loguearse con credenciales incorrectas
    $response = $this->postJson('/api/login', [
        'usuario' => 'wrong@example.com',
        'password' => 'badpass',
    ]);

    //Verificar que la respuesta es 422 con credenciales incorrectas
    $response->assertStatus(422);
});

test('Cerrar Sesión', function () {

    //Crear usuario de prueba
    $user = User::create([
        'usuario' => 'manuel34',
        'primer_nombre' => 'Manuel',
        'segundo_nombre' => 'Antonio',
        'primer_apellido' => 'Fuentes',
        'segundo_apellido' => 'Chamo',
        'email' => 'manuelfuente@gmail.com',
        'estado_id' => UserEstado::ACTIVO,
        'password' => Hash::make('secret123'),
    ]);

    //Autenticar el usuario
    $this->actingAs($user);

    //Intentar desloguearse
    $response = $this->postJson('/api/logout');

    //Verificar que la respuesta es 204 no content y que el usuario ya no está autenticado
    $response->assertNoContent();
    $this->assertGuest();
});
