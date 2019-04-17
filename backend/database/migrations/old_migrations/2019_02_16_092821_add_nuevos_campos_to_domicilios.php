<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNuevosCamposToDomicilios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::table('tb_domicilios', function (Blueprint $table) {
            $table->string('nombre')->nullable();
            $table->string('codigo_postal')->nullable();
            $table->string('telefono_fijo')->nullable();
            $table->string('observaciones')->nullable();
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
            $table->dropColumn('nombre');
            $table->dropColumn('codigo_postal');
            $table->dropColumn('telefono_fijo');
            $table->dropColumn('observaciones');
        });
    }
}
