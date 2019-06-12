<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTbTransacciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transacciones', function (Blueprint $table) {
            $table->increments('idTransacciones');
            $table->string('nombre_apellido')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('fk_tipoPropiedad')->unsigned()->nullable();
            $table->string('titulo')->nullable();
            $table->string('descripcion')->nullable();
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
        Schema::dropIfExists('tb_transacciones');
    }
}
