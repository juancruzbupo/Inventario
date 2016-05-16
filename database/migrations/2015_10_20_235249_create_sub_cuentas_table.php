<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubCuentasTable extends Migration {

	public function up()
	{
		Schema::create('sub_cuentas', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('cuenta_codigo');
			$table->string('nombre');
			$table->integer('stock');
		});
	}

	public function down()
	{
		Schema::drop('sub_cuentas');
	}
}