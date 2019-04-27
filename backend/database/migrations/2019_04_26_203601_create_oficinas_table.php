<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_oficinas', function (Blueprint $table) {
            $table->increments('idOficina');
            $table->integer('Direccion_Pais_Id1')->nullable();
            $table->integer('Direccion_Provincia_Id1')->nullable();
            $table->integer('Direccion_Partido_Id1')->nullable();
            $table->integer('Direccion_Localidad_Id1')->nullable();
            $table->integer('Direccion_Ciudad_Id1')->nullable();
            $table->integer('Direccion_Barrio_Id1')->nullable();
            $table->integer('Direccion_SubBarrio_Id1')->nullable();
            $table->integer('Direccion_Calle_Id1')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->integer('fk_Orientacion')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->integer('fk_TipoBano')->nullable();
            $table->text('SuperficiePlanta')->nullable();
            $table->text('cupada')->nullable();
            $table->text('MontoExpensas')->nullable();
            $table->text('Reciclado')->nullable();
            $table->text('DepartamentosPorPiso')->nullable();
            $table->text('AptoProfesional')->nullable();
            $table->text('SuperficieDeposito')->nullable();
            $table->text('SuperficieOficina')->nullable();
            $table->integer('fk_TipoAscensor')->nullable();
            $table->integer('fk_TipoPiso')->nullable();
            $table->integer('fk_TipoBalcon')->nullable();
            $table->text('CantidadAmbientes')->nullable();
            $table->text('CantidadCocheras')->nullable();
            $table->text('Instalaciones_AireAcondicionadoCentral')->nullable();
            $table->text('Instalaciones_AireAcondicionadoIndividual')->nullable();
            $table->text('Instalaciones_AireCaliente')->nullable();
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
        Schema::dropIfExists('tb_oficinas');
    }
}

