<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductosTable extends Migration {

	public function up()
	{
		Schema::create('productos', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->integer('marca_id')->unsigned();
			$table->integer('modelo_id')->unsigned();
			$table->string('cod_p9')->nullable()->default('null');
			$table->string('nro_serie')->nullable()->default('null');
			$table->string('id_patrimonial')->nullable();
			$table->date('fecha_alta')->nullable();
			$table->date('fecha_baja')->nullable();
			$table->integer('subcuenta_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('productos');
	}
}