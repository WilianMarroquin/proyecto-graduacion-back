<?php

use App\Models\Direcciones\ComunidadBarrio;
use App\Models\Direcciones\ComunidadBarrioDireccion;
use App\Models\Residentes\Genero;
use App\Models\Residentes\Residente;
use App\Models\Residentes\ResidenteTelefonoTipo;
use App\Models\User;
use Spatie\Permission\Models\Role;

beforeEach(function () {
    $this->seed(\Database\Seeders\DatabaseSeeder::class);

    // Autenticar como usuario con rol de Super Admin
    $this->user = User::find(1);

    //Traer el rol de Super Admin
    $rolSuperAdmin = Role::findByName('Super Admin');

    //Asignar el rol al usuario
    $this->user->assignRole($rolSuperAdmin);

    // Autenticar el usuario para las peticiones
    $this->actingAs($this->user);
});

test('Crear un residente', function () {

    //Datos de ejemplo para crear un residente
    $data = [
        'primer_nombre' => 'Cesar',
        'segundo_nombre' => 'Arturo',
        'tercer_nombre' => '',
        'primer_apellido' => 'Gonzalez',
        'segundo_apellido' => 'Lopez',
        'apellido_casada' => '',
        'dpi' => '1234567890101',
        'fecha_nacimiento' => '1990-01-01',
        'direccion' => ['barrio_id' => ComunidadBarrio::EL_CENTRO, 'direccion' => 'Frente a la iglesia'],
        'genero_id' => Genero::MASCULINO,
        'telefonos' => [
            ['numero' => '55512345', 'tipo_id' => ResidenteTelefonoTipo::CASA],
        ]
    ];

    // Realizar la petición POST para crear el residente
    $response = $this->postJson('/api/residentes', $data);

    // Validar que la respuesta tenga el formato esperado
    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente creado con éxito.',
        ])
        ->assertJsonFragment([
            'primer_nombre' => 'Cesar',
            'primer_apellido' => 'Gonzalez',
        ]);

    // Verificar que el residente fue creado en la base de datos
    $this->assertDatabaseHas('residentes', [
        'dpi' => '1234567890101',
        'primer_nombre' => 'Cesar',
        'primer_apellido' => 'Gonzalez',
    ]);

});

test('Editar un residente', function () {

    //Creamos la dirección para asignarla al residente
    $direccion = ComunidadBarrioDireccion::create([
        'id' => 3,
        'direccion' => 'Frente a la iglesia',
        'barrio_id' => ComunidadBarrio::EL_CENTRO
    ]);

    //Datos de ejemplo para crear un residente
    $data = [
        'primer_nombre' => 'Cesar',
        'segundo_nombre' => 'Arturo',
        'tercer_nombre' => '',
        'primer_apellido' => 'Gonzalez',
        'segundo_apellido' => 'Lopez',
        'apellido_casada' => '',
        'dpi' => '1234567890101',
        'fecha_nacimiento' => '1990-01-01',
        'direccion' => ['barrio_id' => ComunidadBarrio::EL_CENTRO, 'direccion' => 'Frente a la iglesia'],
        'direccion_id' => $direccion->id,
        'genero_id' => \App\Models\Residentes\Genero::MASCULINO,
        'telefonos' => [
            ['numero' => '55512345', 'tipo_id' => ResidenteTelefonoTipo::CASA],
        ]
    ];

    // Creamos un residente para luego editarlo
    $residente = Residente::create($data);

    // Nuevos datos para actualizar el residente
    $updateData = $data;
    $updateData['primer_nombre'] = 'Juan';
    $updateData['segundo_apellido'] = 'Palencia';

    // Hacemos la petición PUT para actualizar el residente
    $response = $this->putJson("/api/residentes/{$residente->id}", $updateData);

    // Validamos que la respuesta tenga el formato esperado
    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente actualizado con éxito.',
        ])
        ->assertJsonFragment([
            'primer_nombre' => 'Juan',
            'segundo_apellido' => 'Palencia',
        ]);

    // Verificamos que los datos fueron actualizados en la base de datos
    $this->assertDatabaseHas('residentes', [
        'dpi' => '1234567890101',
        'primer_nombre' => 'Juan',
        'segundo_apellido' => 'Palencia',
    ]);
});

test('Eliminar un residente', function () {

    //Creamos la dirección para asignarla al residente
    $direccion = ComunidadBarrioDireccion::create([
        'id' => 3,
        'direccion' => 'Frente a la iglesia',
        'barrio_id' => ComunidadBarrio::EL_CENTRO
    ]);

    //Datos de ejemplo para crear un residente
    $data = [
        'primer_nombre' => 'Cesar',
        'segundo_nombre' => 'Arturo',
        'tercer_nombre' => '',
        'primer_apellido' => 'Gonzalez',
        'segundo_apellido' => 'Lopez',
        'apellido_casada' => '',
        'dpi' => '1234567890101',
        'fecha_nacimiento' => '1990-01-01',
        'direccion' => ['barrio_id' => ComunidadBarrio::EL_CENTRO, 'direccion' => 'Frente a la iglesia'],
        'direccion_id' => $direccion->id,
        'genero_id' => \App\Models\Residentes\Genero::MASCULINO,
        'telefonos' => [
            ['numero' => '55512345', 'tipo_id' => ResidenteTelefonoTipo::CASA],
        ]
    ];

    // Creamos un residente para luego editarlo
    $residente = Residente::create($data);

    // Hacer la petición DELETE para eliminar el residente
    $response = $this->deleteJson("/api/residentes/{$residente->id}");

    // Validar respuesta
    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente eliminado con éxito.',
        ]);

    // Verificar que el residente fue eliminado (soft delete) en la base de datos
    $this->assertSoftDeleted('residentes', [
        'dpi' => '1234567890101',
    ]);

});
