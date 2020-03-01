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
        Schema::create('tb_fichas_propiedad', function (Blueprint $table) {
            $table->increments('idFichas');
            $table->string("titulo");
            $table->string("ubicacion");
            $table->string("caracteristica");
            $table->string("valor");
            $table->string("comision");
            $table->string("img1fa");//una imagen
            $table->string("img2pr");//15 imagenes
            $table->string("img3pl");//una imagen
            $table->string("img4pl")->nullable();//una imagen
            $table->string("img5sa")->nullable();//una imagen
            $table->string("img6sa")->nullable();//una imagen
            $table->integer('fk_idPropiedad')->unsigned();
            //$table->foreign('fk_idPropiedad')->references('idPropiedad')->on('tb_propiedades');//Clave Foranea
            $table->timestamps();
            $table->softDeletes();
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
