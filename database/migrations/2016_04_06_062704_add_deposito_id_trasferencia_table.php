<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDepositoIdTrasferenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transferencias', function(Blueprint $table) {
            $table->integer('deposito_id')->unsigned()->nullable();
        });

        Schema::table('transferencias', function (Blueprint $table) {
            $table->foreign('deposito_id')->references('id')->on('depositos')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transferencias', function (Blueprint $table) {
            $table->dropForeign('transferencias_deposito_id_foreign');
        });
    }
}
