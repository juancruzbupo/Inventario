<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ForeignDeposito extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('depositos', function (Blueprint $table) {
            $table->foreign('agente_id')->references('id')->on('agentes')
                ->onDelete('restrict')
                ->onUpdate('restrict');
        });
        Schema::table('depositos', function (Blueprint $table) {
            $table->foreign('dependencia_id')->references('id')->on('dependencias')
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
        Schema::table('depositos', function (Blueprint $table) {
            $table->dropForeign('depositos_agente_id_foreign');
        });
        Schema::table('depositos', function (Blueprint $table) {
            $table->dropForeign('depositos_dependencia_id_foreign');
        });
    }
}
