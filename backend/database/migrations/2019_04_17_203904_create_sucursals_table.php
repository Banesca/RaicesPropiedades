<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSucursalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_sucursals', function (Blueprint $table) {
            $table->increments('idSucursal');
            $table->string('nombreSucursal')->nullable();
            $table->string('telefonoSucursal')->nullable();
            $table->string('emailSucursal')->nullable();
            $table->text('direccionSucursal')->nullable();
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
        Schema::dropIfExists('tb_sucursals');
    }
}
