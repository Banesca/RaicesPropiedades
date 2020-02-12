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
            $table->string("img1fa");//una imagen
            $table->string("img2pr");//15 imagenes
            $table->string("img3pl");//una imagen
            $table->string("img4pl");//una imagen
            $table->string("img5sa");//una imagen
            $table->string("img6sa");//una imagen
            $table->integer('fk_idPropiedad')->unsigned();
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
