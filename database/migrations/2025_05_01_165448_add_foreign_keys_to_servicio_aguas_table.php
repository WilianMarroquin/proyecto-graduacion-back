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
        Schema::table('servicio_aguas', function (Blueprint $table) {
            $table->foreign(['residente_id'], 'fk_seervicio_aguas_residentes1')
                ->references(['id'])
                ->on('residentes')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign(['estado_id'], 'fk_servicio_aguas_estados1')
                ->references(['id'])
                ->on('servicio_agua_estados')
                ->onUpdate('no action')
                ->onDelete('no action');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicio_aguas', function (Blueprint $table) {
            $table->dropForeign('fk_seervicio_aguas_residentes1');
            $table->dropForeign('fk_servicio_aguas_estados1');
        });
    }
};
