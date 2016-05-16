<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProductoSalidaMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto_salida__material', function(Blueprint $table) {
            $table->integer('salida__material_id')->unsigned();
            $table->integer('producto_id')->unsigned();
        });

        Schema::table('producto_salida__material', function(Blueprint $table) {
            $table->foreign('salida__material_id')->references('id')->on('salida_materiales')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('producto_salida__material', function(Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')
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
        Schema::drop('producto_salida__material');

        Schema::table('producto_salida__material', function (Blueprint $table) {
            $table->dropForeign('producto_salida__material_salida__material_id_foreign');
        });
        Schema::table('producto_salida__material', function (Blueprint $table) {
            $table->dropForeign('producto_salida__material_producto_id_foreign');
        });
    }
}
