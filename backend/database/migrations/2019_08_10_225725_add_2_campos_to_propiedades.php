<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Add2CamposToPropiedades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->string('Detalle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_propiedades', function (Blueprint $table) {
            $table->dropColumn('TipoBien');
        });
    }
}
