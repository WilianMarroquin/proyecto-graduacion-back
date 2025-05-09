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
        Schema::table('comunidad_barrio_direcciones', function (Blueprint $table) {
            $table->foreign('barrio_id')
                ->references('id')
                ->on('comunidad_barrios')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comunidad_barrio_direcciones', function (Blueprint $table) {
            $table->dropForeign(['barrio_id']);
        });
    }
};
