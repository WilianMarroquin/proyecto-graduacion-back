<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servicio_agua_bitacoras', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->dateTime('fecha_registro');
            $table->unsignedBigInteger('residente_id');
            $table->unsignedBigInteger('servicio_agua_id');
            $table->unsignedBigInteger('transaccion_id');
            $table->unsignedBigInteger('direccion_id');
            $table->unsignedBigInteger('user_transacciona_id');
            $table->text('observaciones')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_agua_bitacoras');
    }
};
