<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCuentasTable extends Migration {

	public function up()
	{
		Schema::create('cuentas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
			$table->integer('codigo')->index();
		});
	}

	public function down()
	{
		Schema::drop('cuentas');
	}
}