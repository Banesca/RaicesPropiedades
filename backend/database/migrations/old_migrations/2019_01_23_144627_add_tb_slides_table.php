<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTbSlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tb_slides', function (Blueprint $table) {            
            $table->unsignedInteger('secciones_pagina')->nullable();
            $table->foreign('secciones_pagina')->references('id')->on('tb_secciones_paginas');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tb_slides', function (Blueprint $table) {
            //
        });
    }
}
