<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCargasTable extends Migration {

	public function up() {
		Schema::create('cargas', function (Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('tipo_comp');
			$table->string('nro');
			$table->decimal('importe');
			$table->integer('cantidad');
			$table->integer('proveedor_id')->unsigned();
			$table->date('fecha');
		});
	}

	public function down() {
		Schema::drop('cargas');
	}
}