<?php

use Illuminate\Database\Migrations\Migration;

class DropAddColumnP9 extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::table('productos', function ($table) {
			$table->dropColumn('cod_p9');
		});

		Schema::table('cargas', function ($table) {
			$table->string('cod_p9')->nullable()->default('null');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		//
	}
}
