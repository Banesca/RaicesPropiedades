<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeronasAutorizadasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_personas_autorizadas', function (Blueprint $table) {
            $table->increments('idPersonaAutorizada');
            $table->string('tipoIdentidad')->nullable();
            $table->string('identidad')->nullable();
            $table->string('telefono')->nullable();
            $table->string('celular')->nullable();
            $table->integer('fk_idUserCliente');
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
        Schema::dropIfExists('tb_personas_autorizadas');
    }
}
