<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_pagos', function (Blueprint $table) {
            $table->increments('idPago');
            $table->string('nombre')->nullable();
            $table->string('apellido')->nullable();
            $table->double('n_transferencia_deposito')->nullable();
            $table->string('detalle')->nullable();
            $table->text('dir_adjunto')->nullable();
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
        Schema::dropIfExists('tb_pagos');
    }
}
