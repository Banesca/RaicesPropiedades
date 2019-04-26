<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuintasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_quintas', function (Blueprint $table) {
            $table->increments('idQuinta');
            $table->text('AptoCredito')->nullable();
            $table->text('Direccion_Pais_Id1')->nullable();
            $table->text('Direccion_Provincia_Id1')->nullable();
            $table->text('Direccion_Partido_Id1')->nullable();
            $table->text('Direccion_Localidad_Id1')->nullable();
            $table->text('Direccion_Ciudad_Id1')->nullable();
            $table->text('Direccion_Barrio_Id1')->nullable();
            $table->text('Direccion_SubBarrio_Id1')->nullable();
            $table->text('Direccion_Calle_Id1')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('Casa_LongitudFrente')->nullable();
            $table->text('Casa_LongitudFondo')->nullable();
            $table->text('Casa_SuperficieTerreno')->nullable();
            $table->text('Casa_SuperficieCubierta')->nullable();
            $table->text('Casa_SuperficieDescubierta')->nullable();
            $table->text('Casa_Antiguedad')->nullable();
            $table->text('Casa_fk_Estado')->nullable();
            $table->text('Casa_fk_TipoUnidad')->nullable();
            $table->text('Casa_fk_TipoTecho')->nullable();
            $table->text('Casa_fk_TipoPiso')->nullable();
            $table->text('Casa_CantidadPlantas')->nullable();
            $table->text('Casa_CantidadBanos')->nullable();
            $table->text('Casa_CantidadAmbientes')->nullable();
            $table->text('Casa_CantidadDormitorios')->nullable();
            $table->text('Casa_CantidadCocheras')->nullable();
            $table->text('Casa_fk_Orientacion')->nullable();
            $table->text('Casa_fk_TipoCosta')->nullable();
            $table->text('Casa_fk_TipoVista')->nullable();
            $table->text('Casa_fk_TipoPendiente')->nullable();
            $table->text('Casa_Servicios_ABL')->nullable();
            $table->text('Casa_Servicios_AguaCorriente')->nullable();
            $table->text('Casa_Servicios_Calefaccion')->nullable();
            $table->text('Casa_Servicios_Conmutador')->nullable();
            $table->text('Casa_Servicios_Electricidad')->nullable();
            $table->text('Casa_Servicios_GasEnvasado')->nullable();
            $table->text('Casa_Servicios_GasNatural')->nullable();
            $table->text('Casa_Servicios_Internet')->nullable();
            $table->text('Casa_Servicios_Refrigeracion')->nullable();
            $table->text('Casa_Servicios_Rentas')->nullable();
            $table->text('Casa_Servicios_Seguridad')->nullable();
            $table->text('Casa_Servicios_Telefono')->nullable();
            $table->text('Casa_Servicios_Videocable')->nullable();
            $table->text('Casa_Servicios_Vigilancia')->nullable();
            $table->text('Casa_Instalaciones_AguaCloaca')->nullable();
            $table->text('Casa_Instalaciones_AguaCorriente')->nullable();
            $table->text('Casa_Instalaciones_AireAcondicionadoCentral')->nullable();
            $table->text('Casa_Instalaciones_AireAcondicionadoIndividual')->nullable();
            $table->text('Casa_Instalaciones_AireCaliente')->nullable();
            $table->text('Casa_Instalaciones_Amoblado')->nullable();
            $table->text('Casa_Instalaciones_ArtefactosDeCocina')->nullable();
            $table->text('Casa_Instalaciones_Ascensor')->nullable();
            $table->text('Casa_Instalaciones_Cable')->nullable();
            $table->text('Casa_Instalaciones_Caldera')->nullable();
            $table->text('Casa_Instalaciones_Calefaccion')->nullable();
            $table->text('Casa_Instalaciones_Desayunador')->nullable();
            $table->text('Casa_Instalaciones_Electricidad')->nullable();
            $table->text('Casa_Instalaciones_EspacioParaVehiculo')->nullable();
            $table->text('Casa_Instalaciones_ExtractorDeAire')->nullable();
            $table->text('Casa_Instalaciones_GasEnvasado')->nullable();
            $table->text('Casa_Instalaciones_GasNatural')->nullable();
            $table->text('Casa_Instalaciones_HogarALena')->nullable();
            $table->text('Casa_Instalaciones_LosaRadiante')->nullable();
            $table->text('Casa_Instalaciones_MueblesDeCocina')->nullable();
            $table->text('Casa_Instalaciones_Pileta')->nullable();
            $table->text('Casa_Instalaciones_Radiadores')->nullable();
            $table->text('Casa_Instalaciones_Termotanque')->nullable();
            $table->text('Casa_Ambientes_Altillo')->nullable();
            $table->text('Casa_Ambientes_AnteCocina')->nullable();
            $table->text('Casa_Ambientes_Antesala')->nullable();
            $table->text('Casa_Ambientes_Azotea')->nullable();
            $table->text('Casa_Ambientes_Balcon')->nullable();
            $table->text('Casa_Ambientes_Bano')->nullable();
            $table->text('Casa_Ambientes_Bar')->nullable();
            $table->text('Casa_Ambientes_Baulera')->nullable();
            $table->text('Casa_Ambientes_Biblioteca')->nullable();
            $table->text('Casa_Ambientes_Bodega')->nullable();
            $table->text('Casa_Ambientes_Cochera')->nullable();
            $table->text('Casa_Ambientes_Cocina')->nullable();
            $table->text('Casa_Ambientes_CocinaComedor')->nullable();
            $table->text('Casa_Ambientes_CocinaKitchinette')->nullable();
            $table->text('Casa_Ambientes_Comedor')->nullable();
            $table->text('Casa_Ambientes_ComedorDiario')->nullable();
            $table->text('Casa_Ambientes_CuartoDeHerramientas')->nullable();
            $table->text('Casa_Ambientes_CuartoDePlanchar')->nullable();
            $table->text('Casa_Ambientes_Dependencia')->nullable();
            $table->text('Casa_Ambientes_DependenciaDeServicio')->nullable();
            $table->text('Casa_Ambientes_Dormitorio')->nullable();
            $table->text('Casa_Ambientes_Entrepiso')->nullable();
            $table->text('Casa_Ambientes_Estudio')->nullable();
            $table->text('Casa_Ambientes_FamilyRoom')->nullable();
            $table->text('Casa_Ambientes_Galeria')->nullable();
            $table->text('Casa_Ambientes_Galpon')->nullable();
            $table->text('Casa_Ambientes_Garage')->nullable();
            $table->text('Casa_Ambientes_Hall')->nullable();
            $table->text('Casa_Ambientes_Jardin')->nullable();
            $table->text('Casa_Ambientes_Lavadero')->nullable();
            $table->text('Casa_Ambientes_Living')->nullable();
            $table->text('Casa_Ambientes_LivingComedor')->nullable();
            $table->text('Casa_Ambientes_Local')->nullable();
            $table->text('Casa_Ambientes_Oficina')->nullable();
            $table->text('Casa_Ambientes_Palier')->nullable();
            $table->text('Casa_Ambientes_Patio')->nullable();
            $table->text('Casa_Ambientes_Playroom')->nullable();
            $table->text('Casa_Ambientes_Quincho')->nullable();
            $table->text('Casa_Ambientes_Sala')->nullable();
            $table->text('Casa_Ambientes_Sotano')->nullable();
            $table->text('Casa_Ambientes_Suite')->nullable();
            $table->text('Casa_Ambientes_Terraza')->nullable();
            $table->text('Casa_Ambientes_Toilette')->nullable();
            $table->text('Casa_Ambientes_Vestibulo')->nullable();
            $table->text('Casa_Ambientes_Vestidor')->nullable();
            $table->text('Casa_Ambientes_Vestuario')->nullable();
            $table->text('Instalaciones_CanchaDeBasquet')->nullable();
            $table->text('Instalaciones_CanchaDeFutbol')->nullable();
            $table->text('Instalaciones_CanchaDeHockey')->nullable();
            $table->text('Instalaciones_CanchaDePaddle')->nullable();
            $table->text('Instalaciones_CanchaDePaleta')->nullable();
            $table->text('Instalaciones_CanchaDeSquash')->nullable();
            $table->text('Instalaciones_CanchaDeTenis')->nullable();
            $table->text('Instalaciones_CanchaDeVoley')->nullable();

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
        Schema::dropIfExists('tb_quintas');
    }
}
