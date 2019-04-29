<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartamentoTipoCasasTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('tb_departamento_tipo_casas', function(Blueprint $table) {
            $table->increments('idDeparTipoCasa');
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
            $table->text('LongitudFrente')->nullable();
            $table->text('LongitudFondo')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->text('CantidadAmbientes')->nullable();
            $table->text('CantidadDormitorios')->nullable();
            $table->text('AptoCredito')->nullable();
            $table->text('AptoProfesional')->nullable();
            $table->integer('fk_TipoTecho')->nullable();
            $table->text('CantidadPlantas')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->text('CantidadCocheras')->nullable();
            $table->integer('fk_Disposicion')->nullable();
            $table->integer('fk_Orientacion')->nullable();
            $table->text('Servicios_ABL')->nullable();
            $table->text('Servicios_AguaCorriente')->nullable();
            $table->text('Servicios_Calefaccion')->nullable();
            $table->text('Servicios_Conmutador')->nullable();
            $table->text('Servicios_Electricidad')->nullable();
            $table->text('Servicios_GasEnvasado')->nullable();
            $table->text('Servicios_GasNatural')->nullable();
            $table->text('Servicios_Internet')->nullable();
            $table->text('Servicios_Limpieza')->nullable();
            $table->text('Servicios_Refrigeracion')->nullable();
            $table->text('Servicios_Rentas')->nullable();
            $table->text('Servicios_RopaCama')->nullable();
            $table->text('Servicios_Seguridad')->nullable();
            $table->text('Servicios_Telefono')->nullable();
            $table->text('Servicios_Toallas')->nullable();
            $table->text('Servicios_Videocable')->nullable();
            $table->text('Servicios_Vigilancia')->nullable();
            $table->text('Instalaciones_AguaCloaca')->nullable();
            $table->text('Instalaciones_AguaCorriente')->nullable();
            $table->text('Instalaciones_AireAcondicionadoCentral')->nullable();
            $table->text('Instalaciones_AireAcondicionadoIndividual')->nullable();
            $table->text('Instalaciones_AireCaliente')->nullable();
            $table->text('Instalaciones_Amoblado')->nullable();
            $table->text('Instalaciones_ArtefactosDeCocina')->nullable();
            $table->text('Instalaciones_Ascensor')->nullable();
            $table->text('Instalaciones_Cable')->nullable();
            $table->text('Instalaciones_CajaFuerte')->nullable();
            $table->text('Instalaciones_Caldera')->nullable();
            $table->text('Instalaciones_Calefaccion')->nullable();
            $table->text('Instalaciones_CanchaFutbol')->nullable();
            $table->text('Instalaciones_CanchaTenis')->nullable();
            $table->text('Instalaciones_Desayunador')->nullable();
            $table->text('Instalaciones_Electricidad')->nullable();
            $table->text('Instalaciones_EspacioParaVehiculo')->nullable();
            $table->text('Instalaciones_ExtractorDeAire')->nullable();
            $table->text('Instalaciones_GasEnvasado')->nullable();
            $table->text('Instalaciones_GasNatural')->nullable();
            $table->text('Instalaciones_HogarALena')->nullable();
            $table->text('Instalaciones_LosaRadiante')->nullable();
            $table->text('Instalaciones_MueblesDeCocina')->nullable();
            $table->text('Instalaciones_MovilidadReducida')->nullable();
            $table->text('Instalaciones_Pavimento')->nullable();
            $table->text('Instalaciones_Pileta')->nullable();
            $table->text('Instalaciones_Radiadores')->nullable();
            $table->text('Instalaciones_Solarium')->nullable();
            $table->text('Instalaciones_Termotanque')->nullable();
            $table->text('Generales_PermiteMascotas')->nullable();
            $table->text('Generales_SeguroCaucion')->nullable();
            $table->text('Ambientes_Altillo')->nullable();
            $table->text('Ambientes_Antesala')->nullable();
            $table->text('Ambientes_Balcon')->nullable();
            $table->text('Ambientes_Bano')->nullable();
            $table->text('Ambientes_Bar')->nullable();
            $table->text('Ambientes_Baulera')->nullable();
            $table->text('Ambientes_Biblioteca')->nullable();
            $table->text('Ambientes_Circulacion')->nullable();
            $table->text('Ambientes_Cochera')->nullable();
            $table->text('Ambientes_Cocina')->nullable();
            $table->text('Ambientes_CocinaComedor')->nullable();
            $table->text('Ambientes_CocinaKitchinette')->nullable();
            $table->text('Ambientes_Comedor')->nullable();
            $table->text('Ambientes_ComedorDiario')->nullable();
            $table->text('Ambientes_CuartoDePlanchar')->nullable();
            $table->text('Ambientes_Dependencia')->nullable();
            $table->text('Ambientes_DependenciaDeServicio')->nullable();
            $table->text('Ambientes_Dormitorio')->nullable();
            $table->text('Ambientes_Entrepiso')->nullable();
            $table->text('Ambientes_Escritorio')->nullable();
            $table->text('Ambientes_Estudio')->nullable();
            $table->text('Ambientes_FamilyRoom')->nullable();
            $table->text('Ambientes_Hall')->nullable();
            $table->text('Ambientes_Jardin')->nullable();
            $table->text('Ambientes_Lavadero')->nullable();
            $table->text('Ambientes_Living')->nullable();
            $table->text('Ambientes_LivingComedor')->nullable();
            $table->text('Ambientes_Palier')->nullable();
            $table->text('Ambientes_Patio')->nullable();
            $table->text('Ambientes_Playroom')->nullable();
            $table->text('Ambientes_Recepcion')->nullable();
            $table->text('Ambientes_Sotano')->nullable();
            $table->text('Ambientes_Suite')->nullable();
            $table->text('Ambientes_Terraza')->nullable();
            $table->text('Ambientes_Toilette')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('tb_departamento_tipo_casas');
    }
}
