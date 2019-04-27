<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCocherasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cocheras', function (Blueprint $table) {
            $table->increments('idCochera');
            $table->integer('Direccion_Pais_Id')->nullable();
            $table->integer('Direccion_Provincia_Id')->nullable();
            $table->integer('Direccion_Partido_Id')->nullable();
            $table->integer('Direccion_Localidad_Id')->nullable();
            $table->integer('Direccion_Ciudad_Id')->nullable();
            $table->integer('Direccion_Barrio_Id')->nullable();
            $table->integer('Direccion_SubBarrio_Id')->nullable();
            $table->integer('Direccion_Calle_Id')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('Largo')->nullable();
            $table->text('Ancho')->nullable();
            $table->text('Altura')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->integer('fk_TipoCobertura')->nullable();
            $table->integer('fk_TipoCoche')->nullable();
            $table->integer('fk_TipoCochera')->nullable();
            $table->integer('fk_TipoAcceso')->nullable();
            $table->text('cupada')->nullable();
            $table->text('Baulera')->nullable();
            $table->text('Generales_SeguroCaucion')->nullable();
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
        Schema::dropIfExists('tb_cocheras');
    }

}
