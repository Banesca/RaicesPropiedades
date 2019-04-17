<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostosEnviosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_costos_envios', function (Blueprint $table) {
            $table->increments('idCostoEnvio');
            $table->string('Codigo_Localidad')->nullable();
            $table->string('Descripcion_Localidad')->nullable();
            $table->string('Codigo_Zona')->nullable();
            $table->string('Descripcion_Zona')->nullable();
            $table->string('Codigo_Provincia')->nullable();
            $table->string('Descripcion_Provincia')->nullable();
            $table->string('Costo2')->nullable();
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
        Schema::dropIfExists('tb_costos_envios');
    }
}
