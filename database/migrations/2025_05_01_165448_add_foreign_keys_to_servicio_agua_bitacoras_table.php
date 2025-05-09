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
        Schema::table('servicio_agua_bitacoras', function (Blueprint $table) {
            $table->foreign(['user_transacciona_id'], 'fk_servicio_agua_bitacoras_users1')
                ->references(['id'])
                ->on('users')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign(['direccion_id'], 'fk_registros_propietarios_servicio_aguas_direcciones1')
                ->references(['id'])
                ->on('comunidad_barrio_direcciones')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign(['servicio_agua_id'], 'fk_registros_propietarios_servicio_aguas_servicio_aguas1')
                ->references(['id'])
                ->on('servicio_aguas')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign(['residente_id'], 'fk_registros_propietarios_servicio_aguas_residentes2')
                ->references(['id'])
                ->on('residentes')
                ->onUpdate('no action')
                ->onDelete('no action');

            $table->foreign(['transaccion_id'], 'fk_registros_propietarios_servicio_aguas_tipo_adquisicion1')
                ->references(['id'])
                ->on('servicio_agua_bitacora_tipo_transacciones')
                ->onUpdate('no action')
                ->onDelete('no action');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('servicio_agua_bitacoras', function (Blueprint $table) {
            $table->dropForeign('fk_servicio_agua_bitacoras_users1');
            $table->dropForeign('fk_registros_propietarios_servicio_aguas_direcciones1');
            $table->dropForeign('fk_registros_propietarios_servicio_aguas_servicio_aguas1');
            $table->dropForeign('fk_registros_propietarios_servicio_aguas_residentes2');
            $table->dropForeign('fk_registros_propietarios_servicio_aguas_tipo_adquisicion1');
        });
    }
};
