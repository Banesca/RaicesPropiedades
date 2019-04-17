<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNuevosCamposToHorariosAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_horario_atencions', function (Blueprint $table) {
            $table->string('dias')->nullable();
            $table->integer('isRegular')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_horario_atencions', function (Blueprint $table) {
            $table->dropColumn('dias');
            $table->dropColumn('isRegular');
        });
    }
}
