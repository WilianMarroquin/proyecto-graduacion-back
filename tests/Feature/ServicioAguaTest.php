<?php

//beforeEach(function () {
//    $this->user = User::factory()->create();
//    $this->actingAs($this->user);
//});
//
//test('crear un servicio de agua', function () {
//    $data = [
//        'nombre' => 'Servicio Central',
//        'tarifa' => 50,
//    ];
//
//    $response = $this->postJson('/api/servicios', $data);
//
//    $response->assertStatus(201)
//        ->assertJsonFragment($data);
//
//    $this->assertDatabaseHas('servicios_agua', $data);
//});
//
//test('editar un servicio de agua', function () {
//    $servicio = ServicioAgua::factory()->create();
//
//    $data = ['tarifa' => 75];
//
//    $response = $this->putJson("/api/servicios/{$servicio->id}", $data);
//
//    $response->assertStatus(200)
//        ->assertJsonFragment($data);
//
//    $this->assertDatabaseHas('servicios_agua', $data);
//});
//
//test('transferir un servicio de agua', function () {
//    $servicio = ServicioAgua::factory()->create();
//    $nuevoUsuario = User::factory()->create();
//
//    $data = ['nuevo_residente_id' => $nuevoUsuario->id];
//
//    $response = $this->postJson("/api/servicios/{$servicio->id}/transferir", $data);
//
//    $response->assertStatus(200);
//    $this->assertDatabaseHas('servicios_agua', [
//        'id' => $servicio->id,
//        'residente_id' => $nuevoUsuario->id,
//    ]);
//});
