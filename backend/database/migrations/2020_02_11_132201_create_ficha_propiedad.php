<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFichaPropiedad extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ficha_propiedad', function (Blueprint $table) {
            $table->increments('id');
            $table->string("titulo");
            $table->string("ubicacion");
            $table->string("caracteristica");
            $table->string("valor");
            $table->string("");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_ficha_propiedad');
    }
}
