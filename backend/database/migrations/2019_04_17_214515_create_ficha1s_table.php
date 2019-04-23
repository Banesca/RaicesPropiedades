<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicha1sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_ficha1', function (Blueprint $table) {
            $table->increments('idFicha1');
            $table->string('descipcion')->nullable();
            $table->integer('fk_tipoPropiedad')->unsigned()->nullable();
            $table->string('esUnaPropiedad')->nullable();
            $table->string('esUnaNovedad')->nullable();
            $table->string('apareceEnGaleriaInicia')->nullable();
            $table->integer('fk_estado_publicacion')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_ficha1');
    }
}
