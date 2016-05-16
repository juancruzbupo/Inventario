<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateModelosTable extends Migration {

	public function up()
	{
		Schema::create('modelos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
		});
	}

	public function down()
	{
		Schema::drop('modelos');
	}
}