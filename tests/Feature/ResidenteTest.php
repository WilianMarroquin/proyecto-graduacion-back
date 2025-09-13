<?php

use App\Models\Residente;
use App\Models\User;

beforeEach(function () {
    $this->user = User::factory()->create();
    $this->actingAs($this->user);
});

test('crear un residente', function () {
    $data = [
        'nombre' => 'Juan Pérez',
        'direccion' => 'Calle 123',
    ];

    $response = $this->postJson('/api/residentes', $data);

    $response->assertStatus(201)
        ->assertJsonFragment($data);

    $this->assertDatabaseHas('residentes', $data);
});

test('editar un residente', function () {
    $residente = Residente::factory()->create();

    $data = ['direccion' => 'Nueva dirección 456'];

    $response = $this->putJson("/api/residentes/{$residente->id}", $data);

    $response->assertStatus(200)
        ->assertJsonFragment($data);

    $this->assertDatabaseHas('residentes', $data);
});

test('eliminar un residente', function () {
    $residente = Residente::factory()->create();

    $response = $this->deleteJson("/api/residentes/{$residente->id}");

    $response->assertNoContent();

    $this->assertDatabaseMissing('residentes', ['id' => $residente->id]);
});
