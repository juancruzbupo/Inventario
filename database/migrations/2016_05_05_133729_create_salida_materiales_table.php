<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalidaMaterialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salida_materiales', function(Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->date('fecha');
            $table->decimal('monto');
            $table->date('fecha_baja');
            $table->integer('agente_id')->unsigned()->nullable();
            $table->integer('dependencia_id')->unsigned()->nullable();
            $table->integer('producto_id')->unsigned()->nullable();
            $table->integer('deposito_id')->unsigned()->nullable();
        });

        Schema::table('salida_materiales', function (Blueprint $table) {
            $table->foreign('dependencia_id')->references('id')->on('dependencias')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('agente_id')->references('id')->on('agentes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('producto_id')->references('id')->on('productos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
            $table->foreign('deposito_id')->references('id')->on('depositos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('salida_materiales');

        Schema::table('salida_materiales', function (Blueprint $table) {
            $table->dropForeign('salida_materiales_dependencia_id_foreign');
            $table->dropForeign('salida_materiales_agente_id_foreign');
            $table->dropForeign('salida_materiales_producto_id_foreign');
            $table->dropForeign('salida_materiales_deposito_id_foreign');
        });

    }
}
