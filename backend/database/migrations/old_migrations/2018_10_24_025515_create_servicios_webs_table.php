<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiciosWebsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_servicios_web', function (Blueprint $table) {
            $table->increments('idServicioWeb');
            $table->string('titulo');
            $table->string('descripcion');
            $table->string('foto');
            $table->integer('fk_idStatus');
            $table->integer('fk_idListaEmail');
            $table->integer('fk_idListaTelefono');
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
        Schema::dropIfExists('tb_servicios_web');
    }
}
