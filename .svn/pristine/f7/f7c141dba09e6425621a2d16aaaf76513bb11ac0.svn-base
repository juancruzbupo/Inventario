<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProveedoresTable extends Migration {

	public function up()
	{
		Schema::create('proveedores', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('nombre');
		});
	}

	public function down()
	{
		Schema::drop('proveedores');
	}
}