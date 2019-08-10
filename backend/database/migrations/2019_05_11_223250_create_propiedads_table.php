<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropiedadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_propiedades', function (Blueprint $table) {
            $table->increments('idPropiedad');
            $table->integer('fk_idTipoPropiedad')->unsigned();
            $table->text('Agricultura')->nullable();
            $table->text('AltoEntrada')->nullable();
            $table->text('Altura')->nullable();
            $table->text('AlturaTecho')->nullable();
            $table->text('Ambientes_Altillo')->nullable();
            $table->text('Ambientes_AnteCocina')->nullable();
            $table->text('Ambientes_Antesala')->nullable();
            $table->text('Ambientes_Archivo')->nullable();
            $table->text('Ambientes_Azotea')->nullable();
            $table->text('Ambientes_Balcon')->nullable();
            $table->text('Ambientes_Bano')->nullable();
            $table->text('Ambientes_Bar')->nullable();
            $table->text('Ambientes_Baulera')->nullable();
            $table->text('Ambientes_Biblioteca')->nullable();
            $table->text('Ambientes_Bodega')->nullable();
            $table->text('Ambientes_Circulacion')->nullable();
            $table->text('Ambientes_Cochera')->nullable();
            $table->text('Ambientes_Cocina')->nullable();
            $table->text('Ambientes_CocinaComedor')->nullable();
            $table->text('Ambientes_CocinaKitchinette')->nullable();
            $table->text('Ambientes_Comedor')->nullable();
            $table->text('Ambientes_ComedorDiario')->nullable();
            $table->text('Ambientes_CuartoDeHerramientas')->nullable();
            $table->text('Ambientes_CuartoDePlanchar')->nullable();
            $table->text('Ambientes_Dependencia')->nullable();
            $table->text('Ambientes_DependenciaDeServicio')->nullable();
            $table->text('Ambientes_Deposito')->nullable();
            $table->text('Ambientes_Dormitorio')->nullable();
            $table->text('Ambientes_Entrepiso')->nullable();
            $table->text('Ambientes_Escritorio')->nullable();
            $table->text('Ambientes_Estudio')->nullable();
            $table->text('Ambientes_FamilyRoom')->nullable();
            $table->text('Ambientes_Galeria')->nullable();
            $table->text('Ambientes_Galpon')->nullable();
            $table->text('Ambientes_Garage')->nullable();
            $table->text('Ambientes_Hall')->nullable();
            $table->text('Ambientes_Jardin')->nullable();
            $table->text('Ambientes_Lavadero')->nullable();
            $table->text('Ambientes_Living')->nullable();
            $table->text('Ambientes_LivingComedor')->nullable();
            $table->text('Ambientes_Local')->nullable();
            $table->text('Ambientes_Oficina')->nullable();
            $table->text('Ambientes_Palier')->nullable();
            $table->text('Ambientes_Patio')->nullable();
            $table->text('Ambientes_Playroom')->nullable();
            $table->text('Ambientes_Quincho')->nullable();
            $table->text('Ambientes_Recepcion')->nullable();
            $table->text('Ambientes_Sala')->nullable();
            $table->text('Ambientes_Sotano')->nullable();
            $table->text('Ambientes_Suite')->nullable();
            $table->text('Ambientes_Terraza')->nullable();
            $table->text('Ambientes_Toilette')->nullable();
            $table->text('Ambientes_Vestibulo')->nullable();
            $table->text('Ambientes_Vestidor')->nullable();
            $table->text('Ambientes_Vestuario')->nullable();
            $table->text('Ancho')->nullable();
            $table->text('AnchoEntrada')->nullable();
            $table->text('Antiguedad')->nullable();
            $table->text('AntiguedadComercio')->nullable();
            $table->text('AptoCredito')->nullable();
            $table->text('AptoProfesional')->nullable();
            $table->text('Baulera')->nullable();
            $table->text('CantidadAmbientes')->nullable();
            $table->text('CantidadBanos')->nullable();
            $table->text('CantidadCocheras')->nullable();
            $table->text('CantidadColumnas')->nullable();
            $table->text('CantidadCubiertos')->nullable();
            $table->text('CantidadDormitorios')->nullable();
            $table->text('CantidadEstrellas')->nullable();
            $table->text('CantidadHabitaciones')->nullable();
            $table->text('CantidadHectareas')->nullable();
            $table->text('CantidadNaves')->nullable();
            $table->text('CantidadOficinas')->nullable();
            $table->text('CantidadPersonal')->nullable();
            $table->text('CantidadPisos')->nullable();
            $table->text('CantidadPlantas')->nullable();
            $table->text('CantidadPlazas')->nullable();
            $table->text('CasaCaseros')->nullable();
            $table->text('CasaPrincipal')->nullable();
            $table->text('CocheraOptativa')->nullable();
            $table->text('cupada')->nullable();
            $table->text('Demolicion')->nullable();
            $table->text('DepartamentosPorPiso')->nullable();
            $table->text('Direccion_Coordenadas_Latitud')->nullable();
            $table->text('Direccion_Coordenadas_Longitud')->nullable();
            $table->text('Direccion_Departamento')->nullable();
            $table->text('Direccion_Nombrecalle')->nullable();
            $table->text('Direccion_Numero')->nullable();
            $table->text('Direccion_Piso')->nullable();
            $table->text('Disponibilidad')->nullable();
            $table->text('DistanciaPavimento')->nullable();
            $table->text('EnEdificio')->nullable();
            $table->text('Estado')->nullable();
            $table->text('Expensas')->nullable();
            $table->integer('fk_Direccion_Barrio_Id')->nullable();
            $table->integer('fk_Direccion_Calle_Id')->nullable();
            $table->integer('fk_Direccion_Ciudad_Id')->nullable();
            $table->integer('fk_Direccion_Localidad_Id')->nullable();
            $table->integer('fk_Direccion_Pais_Id')->nullable();
            $table->integer('fk_Direccion_Partido_Id')->nullable();
            $table->integer('fk_Direccion_Provincia_Id')->nullable();
            $table->integer('fk_Direccion_SubBarrio_Id')->nullable();
            $table->integer('fk_Disposicion')->nullable();
            $table->integer('fk_Estado')->nullable();
            $table->integer('fk_Orientacion')->nullable();
            $table->integer('fk_TipoAcceso')->nullable();
            $table->integer('fk_TipoAscensor')->nullable();
            $table->integer('fk_TipoBalcon')->nullable();
            $table->integer('fk_TipoBano')->nullable();
            $table->integer('fk_TipoCalefaccion')->nullable();
            $table->integer('fk_TipoCampo')->nullable();
            $table->integer('fk_TipoCobertura')->nullable();
            $table->integer('fk_TipoCoche')->nullable();
            $table->integer('fk_TipoCochera')->nullable();
            $table->integer('fk_TipoCosta')->nullable();
            $table->integer('fk_TipoEdificio')->nullable();
            $table->integer('fk_TipoExpensas')->nullable();
            $table->integer('fk_TipoFondoComercio')->nullable();
            $table->integer('fk_TipoFrente')->nullable();
            $table->integer('fk_TipoHotel')->nullable();
            $table->integer('fk_TipoLocal')->nullable();
            $table->integer('fk_TipoPendiente')->nullable();
            $table->integer('fk_TipoPiso')->nullable();
            $table->integer('fk_TipoPorton')->nullable();
            $table->integer('fk_TipoTecho')->nullable();
            $table->integer('fk_TipoTechoIndustrial')->nullable();
            $table->integer('fk_TipoTerreno')->nullable();
            $table->integer('fk_TipoVista')->nullable();
            $table->text('FondoIrregular')->nullable();
            $table->text('FOT')->nullable();
            $table->text('FrenteIrregular')->nullable();
            $table->text('GaleriaShopping')->nullable();
            $table->text('Ganaderia')->nullable();
            $table->text('GeneradorPropio')->nullable();
            $table->text('Generales_PermiteMascotas')->nullable();
            $table->text('Generales_SeguroCaucion')->nullable();
            $table->text('HabitacionesPorPiso')->nullable();
            $table->text('Instalaciones_AguaCaliente')->nullable();
            $table->text('Instalaciones_AguaCalienteCentral')->nullable();
            $table->text('Instalaciones_AguaCloaca')->nullable();
            $table->text('Instalaciones_AguaCorriente')->nullable();
            $table->text('Instalaciones_Aguadas')->nullable();
            $table->text('Instalaciones_AguaPozo')->nullable();
            $table->text('Instalaciones_AireAcondicionadoCentral')->nullable();
            $table->text('Instalaciones_AireAcondicionadoIndividual')->nullable();
            $table->text('Instalaciones_AireCaliente')->nullable();
            $table->text('Instalaciones_AlambradoPerimetral')->nullable();
            $table->text('Instalaciones_Alambrados')->nullable();
            $table->text('Instalaciones_Amoblado')->nullable();
            $table->text('Instalaciones_Arboleda')->nullable();
            $table->text('Instalaciones_ArtefactosDeCocina')->nullable();
            $table->text('Instalaciones_Ascensor')->nullable();
            $table->text('Instalaciones_AscensoresDeServicio')->nullable();
            $table->text('Instalaciones_AscensoresPrincipales')->nullable();
            $table->text('Instalaciones_Balanza')->nullable();
            $table->text('Instalaciones_Bebedero')->nullable();
            $table->text('Instalaciones_Bombeador')->nullable();
            $table->text('Instalaciones_Boxes')->nullable();
            $table->text('Instalaciones_Bretes')->nullable();
            $table->text('Instalaciones_Cable')->nullable();
            $table->text('Instalaciones_CajaFuerte')->nullable();
            $table->text('Instalaciones_Caldera')->nullable();
            $table->text('Instalaciones_Calefaccion')->nullable();
            $table->text('Instalaciones_CanchaDeBasquet')->nullable();
            $table->text('Instalaciones_CanchaDeFutbol')->nullable();
            $table->text('Instalaciones_CanchaDeHockey')->nullable();
            $table->text('Instalaciones_CanchaDePaddle')->nullable();
            $table->text('Instalaciones_CanchaDePaleta')->nullable();
            $table->text('Instalaciones_CanchaDeSquash')->nullable();
            $table->text('Instalaciones_CanchaDeTenis')->nullable();
            $table->text('Instalaciones_CanchaDeVoley')->nullable();
            $table->text('Instalaciones_CanchaFutbol')->nullable();
            $table->text('Instalaciones_CanchaTenis')->nullable();
            $table->text('Instalaciones_Corral')->nullable();
            $table->text('Instalaciones_Desayunador')->nullable();
            $table->text('Instalaciones_Electricidad')->nullable();
            $table->text('Instalaciones_EspacioParaVehiculo')->nullable();
            $table->text('Instalaciones_Estacada')->nullable();
            $table->text('Instalaciones_ExtractorDeAire')->nullable();
            $table->text('Instalaciones_Forestacion')->nullable();
            $table->text('Instalaciones_Fosas')->nullable();
            $table->text('Instalaciones_FuerzaMotriz')->nullable();
            $table->text('Instalaciones_GasEnvasado')->nullable();
            $table->text('Instalaciones_GasIndustrial')->nullable();
            $table->text('Instalaciones_GasNatural')->nullable();
            $table->text('Instalaciones_Gimnasio')->nullable();
            $table->text('Instalaciones_Grua')->nullable();
            $table->text('Instalaciones_GrupoElectrogeno')->nullable();
            $table->text('Instalaciones_Haras')->nullable();
            $table->text('Instalaciones_Hidromasaje')->nullable();
            $table->text('Instalaciones_HogarALena')->nullable();
            $table->text('Instalaciones_InstalacionParrilla')->nullable();
            $table->text('Instalaciones_JuegosParaChicos')->nullable();
            $table->text('Instalaciones_Laundry')->nullable();
            $table->text('Instalaciones_LosaRadiante')->nullable();
            $table->text('Instalaciones_LuzElectrica')->nullable();
            $table->text('Instalaciones_Mangas')->nullable();
            $table->text('Instalaciones_Molino')->nullable();
            $table->text('Instalaciones_Montacarga')->nullable();
            $table->text('Instalaciones_Motores')->nullable();
            $table->text('Instalaciones_MovilidadReducida')->nullable();
            $table->text('Instalaciones_MueblesDeCocina')->nullable();
            $table->text('Instalaciones_Pavimento')->nullable();
            $table->text('Instalaciones_Pileta')->nullable();
            $table->text('Instalaciones_Porton')->nullable();
            $table->text('Instalaciones_Potrero')->nullable();
            $table->text('Instalaciones_Radiadores')->nullable();
            $table->text('Instalaciones_SalonDeFiestas')->nullable();
            $table->text('Instalaciones_Sauna')->nullable();
            $table->text('Instalaciones_Solarium')->nullable();
            $table->text('Instalaciones_Tambo')->nullable();
            $table->text('Instalaciones_TanqueDeAgua')->nullable();
            $table->text('Instalaciones_TanqueDeIncendio')->nullable();
            $table->text('Instalaciones_Telefono')->nullable();
            $table->text('Instalaciones_Termotanque')->nullable();
            $table->text('Instalaciones_TratamientoEfluentes')->nullable();
            $table->text('Instalaciones_Vivienda')->nullable();
            $table->text('Largo')->nullable();
            $table->text('LateralDerechoIrregular')->nullable();
            $table->text('LateralIzquierdoIrregular')->nullable();
            $table->text('Local')->nullable();
            $table->text('LongitudFondo')->nullable();
            $table->text('LongitudFrente')->nullable();
            $table->text('MedidaLinealDerecha')->nullable();
            $table->text('MedidaLinealIzquierda')->nullable();
            $table->text('MetrosDeLaEsquina')->nullable();
            $table->text('MontoExpensas')->nullable();
            $table->text('Ocupada')->nullable();
            $table->text('PropiedadOcupada')->nullable();
            $table->text('RecaudacionMensual')->nullable();
            $table->text('Reciclado')->nullable();
            $table->text('ReferenciaCercana')->nullable();
            $table->text('RentabilidadAnual')->nullable();
            $table->text('Servicios_ABL')->nullable();
            $table->text('Servicios_AguaCorriente')->nullable();
            $table->text('Servicios_Bar')->nullable();
            $table->text('Servicios_Calefaccion')->nullable();
            $table->text('Servicios_Cocina')->nullable();
            $table->text('Servicios_Conmutador')->nullable();
            $table->text('Servicios_Electricidad')->nullable();
            $table->text('Servicios_GasEnvasado')->nullable();
            $table->text('Servicios_GasNatural')->nullable();
            $table->text('Servicios_Internet')->nullable();
            $table->text('Servicios_Lavanderia')->nullable();
            $table->text('Servicios_Limpieza')->nullable();
            $table->text('Servicios_Refrigeracion')->nullable();
            $table->text('Servicios_Rentas')->nullable();
            $table->text('Servicios_RopaCama')->nullable();
            $table->text('Servicios_Seguridad')->nullable();
            $table->text('Servicios_Telefono')->nullable();
            $table->text('Servicios_Toallas')->nullable();
            $table->text('Servicios_Videocable')->nullable();
            $table->text('Servicios_Vigilancia')->nullable();
            $table->text('SuperficieConstruible')->nullable();
            $table->text('SuperficieCubierta')->nullable();
            $table->text('SuperficieCubiertaCasa')->nullable();
            $table->text('SuperficieDeposito')->nullable();
            $table->text('SuperficieDescubierta')->nullable();
            $table->text('SuperficieLocal')->nullable();
            $table->text('SuperficieOficina')->nullable();
            $table->text('SuperficiePlanta')->nullable();
            $table->text('SuperficiePlaya')->nullable();
            $table->text('SuperficieTerreno')->nullable();
            $table->text('SuperficieTotal')->nullable();
            $table->text('TerrenoPropio')->nullable();
            $table->text('UltimaActividad')->nullable();
            $table->text('VentaMercaderia')->nullable();
            $table->text('Vidriera')->nullable();
            $table->text('Vivienda')->nullable();
            $table->text('Zonificacion')->nullable();
            $table->integer('fk_ficha2')->unsigned()->nullable();

            $table->integer('fk_Direccion_Region_Id')->unsigned()->nullable();
            $table->integer('fk_TipoUnidadCasa')->unsigned()->nullable();
            $table->integer('fk_TipoUnidadDepartamento')->unsigned()->nullable();

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
        Schema::dropIfExists('tb_propiedades');
    }
}
