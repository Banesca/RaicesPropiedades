<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCamposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_campos', function (Blueprint $table) {
            $table->increments('idCampo');
            $table->integer('Direccion_Pais_Id')->nullable();
            $table->integer('Direccion_Provincia_Id')->nullable();
            $table->integer('Direccion_Partido_Id')->nullable();
            $table->integer('Direccion_Localidad_Id')->nullable();
            $table->integer('Direccion_Ciudad_Id')->nullable();
            $table->integer('Direccion_Barrio_Id')->nullable();
            $table->integer('Direccion_SubBarrio_Id1')->nullable();
            $table->integer('Direccion_Calle_Id')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieCubiertaCasa')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->text('CantidadHectareas')->nullable();
            $table->text('Ganaderia')->nullable();
            $table->text('Agricultura')->nullable();
            $table->text('CasaPrincipal')->nullable();
            $table->text('CasaCaseros')->nullable();
            $table->text('cupada')->nullable();
            $table->integer('fk_TipoCampo')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->text('DistanciaPavimento')->nullable();
            $table->text('Instalaciones_AguaCorriente')->nullable();
            $table->text('Instalaciones_Aguadas')->nullable();
            $table->text('Instalaciones_AguaPozo')->nullable();
            $table->text('Instalaciones_Alambrados')->nullable();
            $table->text('Instalaciones_Arboleda')->nullable();
            $table->text('Instalaciones_Bebedero')->nullable();
            $table->text('Instalaciones_Boxes')->nullable();
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
            $table->text('Instalaciones_TratamientoEfluentes')->nullable();
            $table->text('Instalaciones_Vivienda')->nullable();
            $table->text('Instalaciones_AlambradoPerimetral')->nullable();
            $table->text('Servicios_ABL')->nullable();
            $table->text('Servicios_Electricidad')->nullable();
            $table->text('Servicios_GasEnvasado')->nullable();
            $table->text('Servicios_GasNatural')->nullable();
            $table->text('Servicios_Rentas')->nullable();
            $table->text('Generales_SeguroCaucion')->nullable();
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
        Schema::dropIfExists('tb_campos');
    }
}