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
        Schema::create('servicio_aguas', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned();
            $table->string('correlativo', 45);
            $table->unsignedBigInteger('residente_id');
            $table->unsignedBigInteger('estado_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_aguas');
    }
};
