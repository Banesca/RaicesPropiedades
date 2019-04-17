<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClasificadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_clasificados', function (Blueprint $table) {
            $table->increments('idClasificado');
            $table->string('foto')->nullable();
            $table->string('titulo')->nullable();
            $table->integer('fk_idUser')->unsigned()->nullable();
            $table->integer('fk_idStatusSistema')->unsigned()->nullable();
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
        Schema::dropIfExists('tb_clasificados');
    }
}
