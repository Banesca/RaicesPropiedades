<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIdElementToSeccionesPaginas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_secciones_paginas', function (Blueprint $table) {
            $table->string('idElement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_secciones_paginas', function (Blueprint $table) {
            $table->dropColumn('idElement');
        });
    }
}
