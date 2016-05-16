<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAgentesTable extends Migration {

	public function up()
	{
		Schema::create('agentes', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('apellido');
			$table->string('nombre');
			$table->string('dni');
			$table->string('legajo');
		});
	}

	public function down()
	{
		Schema::drop('agentes');
	}
}