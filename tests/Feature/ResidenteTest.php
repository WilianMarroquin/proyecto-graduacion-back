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

    $this->user = User::find(1);

    $rolSuperAdmin = Role::findByName('Super Admin');

    $this->user->assignRole($rolSuperAdmin);

    $this->actingAs($this->user);
});

test('crear un residente', function () {
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
        'genero_id' => Genero::MASCULINO,
        'telefonos' => [
            ['numero' => '55512345', 'tipo_id' => ResidenteTelefonoTipo::CASA],
        ]
    ];

    // Realizar la petición POST para crear el residente
    $response = $this->postJson('/api/residentes', $data);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente creado con éxito.',
        ])
        ->assertJsonFragment([
            'primer_nombre' => 'Cesar',
            'primer_apellido' => 'Gonzalez',
        ]);

    $this->assertDatabaseHas('residentes', [
        'dpi' => '1234567890101',
        'primer_nombre' => 'Cesar',
        'primer_apellido' => 'Gonzalez',
    ]);

});

test('editar un residente', function () {

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

    // PUT request
    $response = $this->putJson("/api/residentes/{$residente->id}", $updateData);

    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente actualizado con éxito.',
        ])
        ->assertJsonFragment([
            'primer_nombre' => 'Juan',
            'segundo_apellido' => 'Palencia',
        ]);

    $this->assertDatabaseHas('residentes', [
        'dpi' => '1234567890101',
        'primer_nombre' => 'Juan',
        'segundo_apellido' => 'Palencia',
    ]);
});


test('eliminar un residente', function () {

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

    $response = $this->deleteJson("/api/residentes/{$residente->id}");

    // Validar respuesta
    $response->assertStatus(200)
        ->assertJson([
            'success' => true,
            'message' => 'Residente eliminado con éxito.',
        ]);

    $this->assertSoftDeleted('residentes', [
        'dpi' => '1234567890101',
    ]);

});
