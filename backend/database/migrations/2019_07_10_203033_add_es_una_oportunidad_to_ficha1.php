<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddEsUnaOportunidadToFicha1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_ficha1', function (Blueprint $table) {
            $table->integer('esUnaOportunidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_ficha1', function (Blueprint $table) {
            $table->dropColumn('esUnaOportunidad');
        });
    }
}
