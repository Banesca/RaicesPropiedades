<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTipoDeDiaToHorarioAtencion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_horario_atencions', function (Blueprint $table) {
            $table->string('TipoDeDia')->nullable();
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
            $table->dropColumn('TipoDeDia');
        });
    }
}
