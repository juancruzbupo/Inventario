<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateForeignKeys extends Migration {

	public function up() {
		Schema::table('sub_cuentas', function (Blueprint $table) {
			$table->foreign('cuenta_codigo')->references('codigo')->on('cuentas')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->foreign('marca_id')->references('id')->on('marcas')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->foreign('modelo_id')->references('id')->on('modelos')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->foreign('subcuenta_id')->references('id')->on('sub_cuentas')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('cargas', function (Blueprint $table) {
			$table->foreign('proveedor_id')->references('id')->on('proveedores')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('transferencias', function (Blueprint $table) {
			$table->foreign('agente_id')->references('id')->on('agentes')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
		Schema::table('transferencias', function (Blueprint $table) {
			$table->foreign('dependencia_id')->references('id')->on('dependencias')
				->onDelete('restrict')
				->onUpdate('restrict');
		});
	}

	public function down() {
		Schema::table('sub_cuentas', function (Blueprint $table) {
			$table->dropForeign('sub_cuentas_cuenta_codigo_foreign');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->dropForeign('productos_marca_id_foreign');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->dropForeign('productos_modelo_id_foreign');
		});
		Schema::table('productos', function (Blueprint $table) {
			$table->dropForeign('productos_subcuenta_id_foreign');
		});
		Schema::table('cargas', function (Blueprint $table) {
			$table->dropForeign('cargas_producto_id_foreign');
		});
		Schema::table('cargas', function (Blueprint $table) {
			$table->dropForeign('cargas_proveedor_id_foreign');
		});
		Schema::table('transferencias', function (Blueprint $table) {
			$table->dropForeign('transferencias_agente_id_foreign');
		});
		Schema::table('transferencias', function (Blueprint $table) {
			$table->dropForeign('transferencias_dependencia_id_foreign');
		});
	}
}