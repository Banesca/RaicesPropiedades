<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTerrenosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_terrenos', function (Blueprint $table) {
            $table->increments('idTerreno');
            $table->integer('Direccion_Pais_Id1')->nullable();
            $table->integer('Direccion_Provincia_Id1')->nullable();
            $table->integer('Direccion_Partido_Id1')->nullable();
            $table->integer('Direccion_Localidad_Id1')->nullable();
            $table->integer('Direccion_Ciudad_Id1')->nullable();
            $table->integer('Direccion_Barrio_Id1')->nullable();
            $table->text('Direccion_Subbarrio_Id')->nullable();
            $table->integer('Direccion_Calle_Id1')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('SuperficieTotal')->nullable();
            $table->text('SuperficieConstruible')->nullable();
            $table->text('cupada')->nullable();
            $table->text('Demolicion')->nullable();
            $table->text('FondoIrregular')->nullable();
            $table->text('FrenteIrregular')->nullable();
            $table->text('LateralDerechoIrregular')->nullable();
            $table->text('LateralIzquierdoIrregular')->nullable();
            $table->text('MedidaLinealDerecha')->nullable();
            $table->text('MedidaLinealIzquierda')->nullable();
            $table->text('LongitudFrente')->nullable();
            $table->text('LongitudFondo')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->integer('fk_TipoTerreno')->nullable();
            $table->integer('fk_TipoCosta')->nullable();
            $table->integer('fk_TipoPendiente')->nullable();
            $table->integer('fk_TipoVista')->nullable();
            $table->text('FOT')->nullable();
            $table->text('Zonificacion')->nullable();
            $table->text('Instalaciones_AguaCloaca')->nullable();
            $table->text('Instalaciones_AguaCorriente')->nullable();
            $table->text('Instalaciones_AguaPozo')->nullable();
            $table->text('Instalaciones_Alambrados')->nullable();
            $table->text('Instalaciones_Arboleda')->nullable();
            $table->text('Instalaciones_Bebedero')->nullable();
            $table->text('Instalaciones_Bretes')->nullable();
            $table->text('Instalaciones_Corral')->nullable();
            $table->text('Instalaciones_Electricidad')->nullable();
            $table->text('Instalaciones_Estacada')->nullable();
            $table->text('Instalaciones_Forestacion')->nullable();
            $table->text('Instalaciones_Fosas')->nullable();
            $table->text('Instalaciones_Haras')->nullable();
            $table->text('Instalaciones_LuzElectrica')->nullable();
            $table->text('Instalaciones_Mangas')->nullable();
            $table->text('Instalaciones_Molino')->nullable();
            $table->text('Instalaciones_Pavimento')->nullable();
            $table->text('Instalaciones_Potrero')->nullable();
            $table->text('Instalaciones_Tambo')->nullable();
            $table->text('Instalaciones_Vivienda')->nullable();
            $table->text('Servicios_ABL')->nullable();
            $table->text('Servicios_AguaCorriente')->nullable();
            $table->text('Servicios_Electricidad')->nullable();
            $table->text('Servicios_GasEnvasado')->nullable();
            $table->text('Servicios_GasNatural')->nullable();
            $table->text('Servicios_Rentas')->nullable();
            $table->text('Servicios_Telefono')->nullable();
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
        Schema::dropIfExists('tb_terrenos');
    }
}