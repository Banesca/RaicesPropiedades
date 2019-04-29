<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGalponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_galpones', function (Blueprint $table) {
            $table->increments('idGalpon');
            $table->integer('Direccion_Pais_Id')->nullable();
            $table->integer('Direccion_Provincia_Id')->nullable();
            $table->integer('Direccion_Partido_Id')->nullable();
            $table->integer('Direccion_Localidad_Id')->nullable();
            $table->integer('Direccion_Ciudad_Id')->nullable();
            $table->integer('Direccion_Barrio_Id')->nullable();
            $table->integer('Direccion_SubBarrio_Id')->nullable();
            $table->integer('Direccion_Calle_Id')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->text('SuperficiePlaya')->nullable();
            $table->text('LongitudFrente')->nullable();
            $table->text('LongitudFondo')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->text('CantidadOficinas')->nullable();
            $table->integer('fk_TipoTechoIndustrial')->nullable();
            $table->integer('fk_TipoPorton')->nullable();
            $table->text('GeneradorPropio')->nullable();
            $table->integer('fk_TipoCalefaccion')->nullable();
            $table->text('AnchoEntrada')->nullable();
            $table->text('AltoEntrada')->nullable();
            $table->text('CantidadColumnas')->nullable();
            $table->text('CantidadNaves')->nullable();
            $table->text('Ocupada')->nullable();
            $table->text('CantidadPlantas')->nullable();
            $table->text('AlturaTecho')->nullable();
            $table->text('FOT')->nullable();
            $table->text('Instalaciones_AguaCorriente')->nullable();
            $table->text('Instalaciones_AireAcondicionadoCentral')->nullable();
            $table->text('Instalaciones_AireAcondicionadoIndividual')->nullable();
            $table->text('Instalaciones_Balanza')->nullable();
            $table->text('Instalaciones_Bombeador')->nullable();
            $table->text('Instalaciones_Caldera')->nullable();
            $table->text('Instalaciones_Electricidad')->nullable();
            $table->text('Instalaciones_FuerzaMotriz')->nullable();
            $table->text('Instalaciones_GasEnvasado')->nullable();
            $table->text('Instalaciones_GasIndustrial')->nullable();
            $table->text('Instalaciones_GasNatural')->nullable();
            $table->text('Instalaciones_Grua')->nullable();
            $table->text('Instalaciones_GrupoElectrogeno')->nullable();
            $table->text('Instalaciones_InstalacionParrilla')->nullable();
            $table->text('Instalaciones_LuzElectrica')->nullable();
            $table->text('Instalaciones_Montacarga')->nullable();
            $table->text('Instalaciones_Motores')->nullable();
            $table->text('Instalaciones_Porton')->nullable();
            $table->text('Instalaciones_TanqueDeAgua')->nullable();
            $table->text('Instalaciones_TanqueDeIncendio')->nullable();
            $table->text('Instalaciones_Telefono')->nullable();
            $table->text('Instalaciones_Termotanque')->nullable();
            $table->text('Instalaciones_Vivienda')->nullable();
            $table->text('Servicios_ABL')->nullable();
            $table->text('Servicios_AguaCorriente')->nullable();
            $table->text('Servicios_Electricidad')->nullable();
            $table->text('Servicios_GasEnvasado')->nullable();
            $table->text('Servicios_GasNatural')->nullable();
            $table->text('Servicios_Internet')->nullable();
            $table->text('Servicios_Refrigeracion')->nullable();
            $table->text('Servicios_Rentas')->nullable();
            $table->text('Servicios_Seguridad')->nullable();
            $table->text('Servicios_Telefono')->nullable();
            $table->text('Servicios_Videocable')->nullable();
            $table->text('Servicios_Vigilancia')->nullable();
            $table->text('Generales_SeguroCaucion')->nullable();
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
        Schema::dropIfExists('tb_galpones');
    }
}

