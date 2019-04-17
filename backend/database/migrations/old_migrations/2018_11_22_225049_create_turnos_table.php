<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTurnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_turnos', function (Blueprint $table) {
            $table->increments('idTurnos');
            $table->integer('fk_idClasificado')->unsigned()->nullable();
            $table->integer('fk_idLocalAdherido')->unsigned()->nullable();
            $table->dateTime('fechaHora')->nullable();
            $table->integer('fk_idStatusTurnos')->nullable();
            $table->integer('fk_idUser')->unsigned()->nullable();

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
        Schema::dropIfExists('tb_turnos');
    }
}
