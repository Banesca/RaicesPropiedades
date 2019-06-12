<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvisosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_avisos', function (Blueprint $table) {
            $table->increments('idAviso');
            $table->string('EsWeb')->nullable();
            $table->string('Titulo')->nullable();
            $table->string('IdOrigen')->nullable();
            $table->integer('fk_SistemaOrigen_Id')->unsigned()->nullable();
            $table->string('InformacionAdicional')->nullable();
            $table->integer('fk_TipoOperacion')->unsigned()->nullable();
            $table->string('Vendedor_IdOrigen')->nullable();
            $table->integer('fk_Vendedor_Id')->unsigned()->nullable();
            $table->integer('fk_Vendedor_SistemaOrigen_Id')->unsigned()->nullable();
            $table->string('Fotos_Url')->nullable();
            $table->string('Video')->nullable();
            $table->string('DatosContacto_Nombre')->nullable();
            $table->string('DatosContacto_Apellido')->nullable();
            $table->string('DatosContacto_email')->nullable();
            $table->string('DatosContacto_Telefono')->nullable();
            $table->string('DatosContacto_TelefonoAlternativo')->nullable();
            $table->string('DatosContacto_celular')->nullable();
            $table->string('DatosContacto_web')->nullable();
            $table->string('DatosContacto_DisponibilidadAtencion')->nullable();
            $table->string('Multimedia_Url')->nullable();
            $table->integer('fk_TipoMultimedia_Id')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_avisos');
    }
}
