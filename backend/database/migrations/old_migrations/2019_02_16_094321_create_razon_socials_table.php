<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRazonSocialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {
        Schema::create('tb_razon_socials', function (Blueprint $table) {
            $table->increments('idRazonSocial');
            $table->string('tipoFactura')->nullable();
            $table->string('descripcion')->nullable();
            $table->string('domicilio_fiscal')->nullable();
            $table->string('cuit')->nullable();
            $table->string('fk_idCliente')->nullable();

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
        Schema::dropIfExists('tb_razon_socials');
    }
}
