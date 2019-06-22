<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFicha123sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ficha123s', function (Blueprint $table) {
            $table->increments('idFichas');
            $table->integer('fk_idFicha1')->unsigned()->nullable();
            $table->integer('fk_idFicha2')->unsigned()->nullable();
            $table->integer('fk_idFicha3')->unsigned()->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('ficha123s');
    }
}
