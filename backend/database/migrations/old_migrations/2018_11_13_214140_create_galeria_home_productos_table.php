<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGaleriaHomeProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_galeria_home_productos', function (Blueprint $table) {
            $table->increments('idGaleriaHomeProducto');
            $table->string('titulo');
            $table->string('imagen');
            $table->integer('fk_idStatusSistema')->unsigned();
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
        Schema::dropIfExists('tb_galeria_home_productos');
    }
}
