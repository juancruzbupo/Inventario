<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTransferenciasTable extends Migration {

	public function up()
	{
		Schema::create('transferencias', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->date('fecha');
			$table->integer('codigo');
            $table->decimal('monto');
            $table->date('fecha_baja');
			$table->integer('agente_id')->unsigned()->nullable();
			$table->integer('dependencia_id')->unsigned()->nullable();
		});
	}

	public function down()
	{
		Schema::drop('transferencias');
	}
}