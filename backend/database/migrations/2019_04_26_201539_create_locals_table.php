<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_locales', function (Blueprint $table) {
            $table->increments('idLocal');
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
            $table->integer('fk_Estado')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->integer('fk_TipoLocal')->nullable();
            $table->text('CantidadCocheras')->nullable();
            $table->text('cupada')->nullable();
            $table->text('Vivienda')->nullable();
            $table->text('CantidadPlantas')->nullable();
            $table->text('MontoExpensas')->nullable();
            $table->text('TerrenoPropio')->nullable();
            $table->text('Vidriera')->nullable();
            $table->text('MetrosDeLaEsquina')->nullable();
            $table->text('EnEdificio')->nullable();
            $table->text('UltimaActividad')->nullable();
            $table->text('GaleriaShopping')->nullable();
            $table->text('Ambientes_Altillo')->nullable();
            $table->text('Ambientes_Archivo')->nullable();
            $table->text('Ambientes_Azotea')->nullable();
            $table->text('Ambientes_Balcon')->nullable();
            $table->text('Ambientes_Bano')->nullable();
            $table->text('Ambientes_Bar')->nullable();
            $table->text('Ambientes_Baulera')->nullable();
            $table->text('Ambientes_Cochera')->nullable();
            $table->text('Ambientes_Cocina')->nullable();
            $table->text('Ambientes_Dependencia')->nullable();
            $table->text('Ambientes_DependenciaDeServicio')->nullable();
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
        Schema::dropIfExists('tb_locales');
    }
}