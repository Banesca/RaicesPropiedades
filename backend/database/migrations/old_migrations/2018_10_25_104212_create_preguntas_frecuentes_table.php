<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreguntasFrecuentesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_preguntas_frecuentes', function (Blueprint $table) {
            $table->increments('idPreguntaFrecuente');
            $table->mediumText('pregunta')->nullable();
            $table->mediumText('respuesta')->nullable();
            $table->integer('fk_idUser')->nullable();
            $table->integer('fk_idStatusSistema')->nullable();
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
        Schema::dropIfExists('tb_preguntas_frecuentes');
    }
}
