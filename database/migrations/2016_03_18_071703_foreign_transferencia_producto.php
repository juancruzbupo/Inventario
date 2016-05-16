<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignTransferenciaProducto extends Migration
{

    public function up()
    {
        Schema::table('producto_transferencia', function(Blueprint $table) {
            $table->foreign('transferencia_id')->references('id')->on('transferencias')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
        Schema::table('producto_transferencia', function(Blueprint $table) {
            $table->foreign('producto_id')->references('id')->on('productos')
                        ->onDelete('restrict')
                        ->onUpdate('restrict');
        });
    }


    public function down() {
        Schema::table('producto_transferencia', function (Blueprint $table) {
            $table->dropForeign('producto_transferencia_transferencia_id_foreign');
        });
        Schema::table('producto_transferencia', function (Blueprint $table) {
            $table->dropForeign('producto_transferencia_producto_id_foreign');
        });
    }
}
