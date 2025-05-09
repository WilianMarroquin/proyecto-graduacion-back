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
        Schema::create('residente_telefonos', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('numero', 13);
            $table->unsignedBigInteger('tipo_id')->index('fk_telefonos_residentes_tipo_idx');
            $table->unsignedBigInteger('residente_id')->index('fk_telefonos_residentes_idx');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('residente_telefonos');
    }
};
