<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerfilClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_perfil_clientes', function (Blueprint $table) {
            $table->increments('idPerfilCliente');
            $table->string('nombreComercio')->nullable();
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->string('documento_dni')->nullable();
            $table->string('documento_otro')->nullable();
            $table->string('correo')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();

            $table->integer('fk_idPerfilCliente')->unsigned()->nullable();

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
        Schema::dropIfExists('tb_perfil_clientes');
    }
}
