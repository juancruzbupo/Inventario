<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDependenciaIdAgentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('agentes', function(Blueprint $table) {
            $table->integer('dependencia_id')->unsigned();
        });

        Schema::table('agentes', function (Blueprint $table) {
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
        Schema::table('agentes', function (Blueprint $table) {
            $table->dropForeign('agentes_dependencia_id_foreign');
        });
    }
}
