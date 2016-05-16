<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDependenciasTable extends Migration {

	public function up()
	{
		Schema::create('dependencias', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
			$table->string('es_int')->nullable()->default('null');
		});
	}

	public function down()
	{
		Schema::drop('dependencias');
	}
}