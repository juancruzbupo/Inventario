<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TransferenciaPrducto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   //las tablas tienen q ser en singular y ordenada alfabeticamente p primero q t
        Schema::create('producto_transferencia', function(Blueprint $table) {
            $table->integer('transferencia_id')->unsigned();
            $table->integer('producto_id')->unsigned();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('producto_transferencia');

    }
}
