<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposToDomicilio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_domicilios', function (Blueprint $table) {
            $table->string('provincia')->nullable();
            $table->string('localidad')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_domicilios', function (Blueprint $table) {
            $table->dropColumn('provincia');
            $table->dropColumn('localidad');
        });
    }
}
