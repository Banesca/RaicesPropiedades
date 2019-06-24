<?php

use App\Ficha1;
use App\Ficha123;
use App\Ficha2;
use App\Propiedad;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

class PublicacionesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {

        for ($i = 0; $i < 10; $i++) {
            $ficha1 = new Ficha1([
                'descipcion'             => 'Hola'.$i,
                'fk_tipoPropiedad'       => $i,
                'esUnaPropiedad'         => rand(0, 1),
                'esUnaNovedad'           => rand(0, 1),
                'apareceEnGaleriaInicia' => rand(0, 1),
                'fk_estado_publicacion'  => rand(1, 3),
            ]);
            $ficha1->save();

            $ficha2 = new Ficha2([
                'imagen1'             => 'http://placeimg.com/640/480/arch',
                'imagen2'             => 'http://placeimg.com/640/480/arch',
                'imagen3'             => 'http://placeimg.com/640/480/arch',
                'imagen4'             => 'http://placeimg.com/640/480/arch',
                'imagen5'             => 'http://placeimg.com/640/480/arch',
                'imagen6'             => 'http://placeimg.com/640/480/arch',
                'imagen7'             => 'http://placeimg.com/640/480/arch',
                'imagen_para_galeria' => 'http://placeimg.com/640/480/arch',
                'fk_ficha1'           => $ficha1->idFicha1,
            ]);
            $ficha2->save();

            $ficha3 = new Propiedad([
                'fk_idTipoPropiedad'                        => rand(1, 13),
                'Agricultura'                               => rand(0, 1),
                'AltoEntrada'                               => rand(0, 1),
                'Altura'                                    => rand(0, 1),
                'AlturaTecho'                               => rand(0, 1),
                'Ambientes_Altillo'                         => rand(0, 1),
                'Ambientes_AnteCocina'                      => rand(0, 1),
                'Ambientes_Antesala'                        => rand(0, 1),
                'Ambientes_Archivo'                         => rand(0, 1),
                'Ambientes_Azotea'                          => rand(0, 1),
                'Ambientes_Balcon'                          => rand(0, 1),
                'Ambientes_Bano'                            => rand(0, 1),
                'Ambientes_Bar'                             => rand(0, 1),
                'Ambientes_Baulera'                         => rand(0, 1),
                'Ambientes_Biblioteca'                      => rand(0, 1),
                'Ambientes_Bodega'                          => rand(0, 1),
                'Ambientes_Circulacion'                     => rand(0, 1),
                'Ambientes_Cochera'                         => rand(0, 1),
                'Ambientes_Cocina'                          => rand(0, 1),
                'Ambientes_CocinaComedor'                   => rand(0, 1),
                'Ambientes_CocinaKitchinette'               => rand(0, 1),
                'Ambientes_Comedor'                         => rand(0, 1),
                'Ambientes_ComedorDiario'                   => rand(0, 1),
                'Ambientes_CuartoDeHerramientas'            => rand(0, 1),
                'Ambientes_CuartoDePlanchar'                => rand(0, 1),
                'Ambientes_Dependencia'                     => rand(0, 1),
                'Ambientes_DependenciaDeServicio'           => rand(0, 1),
                'Ambientes_Deposito'                        => rand(0, 1),
                'Ambientes_Dormitorio'                      => rand(0, 1),
                'Ambientes_Entrepiso'                       => rand(0, 1),
                'Ambientes_Escritorio'                      => rand(0, 1),
                'Ambientes_Estudio'                         => rand(0, 1),
                'Ambientes_FamilyRoom'                      => rand(0, 1),
                'Ambientes_Galeria'                         => rand(0, 1),
                'Ambientes_Galpon'                          => rand(0, 1),
                'Ambientes_Garage'                          => rand(0, 1),
                'Ambientes_Hall'                            => rand(0, 1),
                'Ambientes_Jardin'                          => rand(0, 1),
                'Ambientes_Lavadero'                        => rand(0, 1),
                'Ambientes_Living'                          => rand(0, 1),
                'Ambientes_LivingComedor'                   => rand(0, 1),
                'Ambientes_Local'                           => rand(0, 1),
                'Ambientes_Oficina'                         => rand(0, 1),
                'Ambientes_Palier'                          => rand(0, 1),
                'Ambientes_Patio'                           => rand(0, 1),
                'Ambientes_Playroom'                        => rand(0, 1),
                'Ambientes_Quincho'                         => rand(0, 1),
                'Ambientes_Recepcion'                       => rand(0, 1),
                'Ambientes_Sala'                            => rand(0, 1),
                'Ambientes_Sotano'                          => rand(0, 1),
                'Ambientes_Suite'                           => rand(0, 1),
                'Ambientes_Terraza'                         => rand(0, 1),
                'Ambientes_Toilette'                        => rand(0, 1),
                'Ambientes_Vestibulo'                       => rand(0, 1),
                'Ambientes_Vestidor'                        => rand(0, 1),
                'Ambientes_Vestuario'                       => rand(0, 1),
                'Ancho'                                     => '1',
                'AnchoEntrada'                              => 1,
                'Antiguedad'                                => rand(0, 1),
                'AntiguedadComercio'                        => rand(0, 1),
                'AptoCredito'                               => rand(0, 1),
                'AptoProfesional'                           => rand(0, 1),
                'Baulera'                                   => rand(0, 1),
                'CantidadAmbientes'                         => rand(0, 1),
                'CantidadBanos'                             => rand(0, 1),
                'CantidadCocheras'                          => rand(0, 1),
                'CantidadColumnas'                          => rand(0, 1),
                'CantidadCubiertos'                         => rand(0, 1),
                'CantidadDormitorios'                       => rand(0, 1),
                'CantidadEstrellas'                         => rand(0, 1),
                'CantidadHabitaciones'                      => rand(0, 1),
                'CantidadHectareas'                         => rand(0, 1),
                'CantidadNaves'                             => rand(0, 1),
                'CantidadOficinas'                          => rand(0, 1),
                'CantidadPersonal'                          => rand(0, 1),
                'CantidadPisos'                             => rand(0, 1),
                'CantidadPlantas'                           => rand(0, 1),
                'CantidadPlazas'                            => rand(0, 1),
                'CasaCaseros'                               => rand(0, 1),
                'CasaPrincipal'                             => rand(0, 1),
                'CocheraOptativa'                           => rand(0, 1),
                'cupada'                                    => rand(0, 1),
                'Demolicion'                                => rand(0, 1),
                'DepartamentosPorPiso'                      => rand(0, 1),
                'Direccion_Coordenadas_Latitud'             => rand(0, 1),
                'Direccion_Coordenadas_Longitud'            => rand(0, 1),
                'Direccion_Departamento'                    => rand(0, 1),
                'Direccion_Nombrecalle'                     => rand(0, 1),
                'Direccion_Numero'                          => rand(0, 1),
                'Direccion_Piso'                            => rand(0, 1),
                'Disponibilidad'                            => rand(0, 1),
                'DistanciaPavimento'                        => rand(0, 1),
                'EnEdificio'                                => rand(0, 1),
                'Estado'                                    => rand(0, 1),
                'Expensas'                                  => rand(0, 1),
                'fk_Direccion_Barrio_Id'                    => rand(1, 3),
                'fk_Direccion_Calle_Id'                     => rand(1, 3),
                'fk_Direccion_Ciudad_Id'                    => rand(1, 3),
                'fk_Direccion_Localidad_Id'                 => rand(1, 3),
                'fk_Direccion_Pais_Id'                      => rand(1, 3),
                'fk_Direccion_Partido_Id'                   => rand(1, 3),
                'fk_Direccion_Provincia_Id'                 => rand(1, 3),
                'fk_Direccion_SubBarrio_Id'                 => rand(1, 3),
                'fk_Disposicion'                            => rand(1, 3),
                'fk_Estado'                                 => rand(1, 3),
                'fk_Orientacion'                            => rand(1, 3),
                'fk_TipoAcceso'                             => rand(1, 3),
                'fk_TipoAscensor'                           => rand(1, 3),
                'fk_TipoBalcon'                             => rand(1, 3),
                'fk_TipoBano'                               => rand(1, 3),
                'fk_TipoCalefaccion'                        => rand(1, 3),
                'fk_TipoCampo'                              => rand(1, 3),
                'fk_TipoCobertura'                          => rand(1, 3),
                'fk_TipoCoche'                              => rand(1, 3),
                'fk_TipoCochera'                            => rand(1, 3),
                'fk_TipoCosta'                              => rand(1, 3),
                'fk_TipoEdificio'                           => rand(1, 3),
                'fk_TipoExpensas'                           => rand(1, 3),
                'fk_TipoFondoComercio'                      => rand(1, 3),
                'fk_TipoFrente'                             => rand(1, 3),
                'fk_TipoHotel'                              => rand(1, 3),
                'fk_TipoLocal'                              => rand(1, 3),
                'fk_TipoPendiente'                          => rand(1, 3),
                'fk_TipoPiso'                               => rand(1, 3),
                'fk_TipoPorton'                             => rand(1, 3),
                'fk_TipoTecho'                              => rand(1, 3),
                'fk_TipoTechoIndustrial'                    => rand(1, 3),
                'fk_TipoTerreno'                            => rand(1, 3),
                'fk_TipoUnidad'                             => rand(1, 3),
                'fk_TipoVista'                              => rand(1, 3),
                'FondoIrregular'                            => rand(0, 1),
                'FOT'                                       => rand(0, 1),
                'FrenteIrregular'                           => rand(0, 1),
                'GaleriaShopping'                           => rand(0, 1),
                'Ganaderia'                                 => rand(0, 1),
                'GeneradorPropio'                           => rand(0, 1),
                'Generales_PermiteMascotas'                 => rand(0, 1),
                'Generales_SeguroCaucion'                   => rand(0, 1),
                'HabitacionesPorPiso'                       => rand(0, 1),
                'Instalaciones_AguaCaliente'                => rand(0, 1),
                'Instalaciones_AguaCalienteCentral'         => rand(0, 1),
                'Instalaciones_AguaCloaca'                  => rand(0, 1),
                'Instalaciones_AguaCorriente'               => rand(0, 1),
                'Instalaciones_Aguadas'                     => rand(0, 1),
                'Instalaciones_AguaPozo'                    => rand(0, 1),
                'Instalaciones_AireAcondicionadoCentral'    => rand(0, 1),
                'Instalaciones_AireAcondicionadoIndividual' => rand(0, 1),
                'Instalaciones_AireCaliente'                => rand(0, 1),
                'Instalaciones_AlambradoPerimetral'         => rand(0, 1),
                'Instalaciones_Alambrados'                  => rand(0, 1),
                'Instalaciones_Amoblado'                    => rand(0, 1),
                'Instalaciones_Arboleda'                    => rand(0, 1),
                'Instalaciones_ArtefactosDeCocina'          => rand(0, 1),
                'Instalaciones_Ascensor'                    => rand(0, 1),
                'Instalaciones_AscensoresDeServicio'        => rand(0, 1),
                'Instalaciones_AscensoresPrincipales'       => rand(0, 1),
                'Instalaciones_Balanza'                     => rand(0, 1),
                'Instalaciones_Bebedero'                    => rand(0, 1),
                'Instalaciones_Bombeador'                   => rand(0, 1),
                'Instalaciones_Boxes'                       => rand(0, 1),
                'Instalaciones_Bretes'                      => rand(0, 1),
                'Instalaciones_Cable'                       => rand(0, 1),
                'Instalaciones_CajaFuerte'                  => rand(0, 1),
                'Instalaciones_Caldera'                     => rand(0, 1),
                'Instalaciones_Calefaccion'                 => rand(0, 1),
                'Instalaciones_CanchaDeBasquet'             => rand(0, 1),
                'Instalaciones_CanchaDeFutbol'              => rand(0, 1),
                'Instalaciones_CanchaDeHockey'              => rand(0, 1),
                'Instalaciones_CanchaDePaddle'              => rand(0, 1),
                'Instalaciones_CanchaDePaleta'              => rand(0, 1),
                'Instalaciones_CanchaDeSquash'              => rand(0, 1),
                'Instalaciones_CanchaDeTenis'               => rand(0, 1),
                'Instalaciones_CanchaDeVoley'               => rand(0, 1),
                'Instalaciones_CanchaFutbol'                => rand(0, 1),
                'Instalaciones_CanchaTenis'                 => rand(0, 1),
                'Instalaciones_Corral'                      => rand(0, 1),
                'Instalaciones_Desayunador'                 => rand(0, 1),
                'Instalaciones_Electricidad'                => rand(0, 1),
                'Instalaciones_EspacioParaVehiculo'         => rand(0, 1),
                'Instalaciones_Estacada'                    => rand(0, 1),
                'Instalaciones_ExtractorDeAire'             => rand(0, 1),
                'Instalaciones_Forestacion'                 => rand(0, 1),
                'Instalaciones_Fosas'                       => rand(0, 1),
                'Instalaciones_FuerzaMotriz'                => rand(0, 1),
                'Instalaciones_GasEnvasado'                 => rand(0, 1),
                'Instalaciones_GasIndustrial'               => rand(0, 1),
                'Instalaciones_GasNatural'                  => rand(0, 1),
                'Instalaciones_Gimnasio'                    => rand(0, 1),
                'Instalaciones_Grua'                        => rand(0, 1),
                'Instalaciones_GrupoElectrogeno'            => rand(0, 1),
                'Instalaciones_Haras'                       => rand(0, 1),
                'Instalaciones_Hidromasaje'                 => rand(0, 1),
                'Instalaciones_HogarALena'                  => rand(0, 1),
                'Instalaciones_InstalacionParrilla'         => rand(0, 1),
                'Instalaciones_JuegosParaChicos'            => rand(0, 1),
                'Instalaciones_Laundry'                     => rand(0, 1),
                'Instalaciones_LosaRadiante'                => rand(0, 1),
                'Instalaciones_LuzElectrica'                => rand(0, 1),
                'Instalaciones_Mangas'                      => rand(0, 1),
                'Instalaciones_Molino'                      => rand(0, 1),
                'Instalaciones_Montacarga'                  => rand(0, 1),
                'Instalaciones_Motores'                     => rand(0, 1),
                'Instalaciones_MovilidadReducida'           => rand(0, 1),
                'Instalaciones_MueblesDeCocina'             => rand(0, 1),
                'Instalaciones_Pavimento'                   => rand(0, 1),
                'Instalaciones_Pileta'                      => rand(0, 1),
                'Instalaciones_Porton'                      => rand(0, 1),
                'Instalaciones_Potrero'                     => rand(0, 1),
                'Instalaciones_Radiadores'                  => rand(0, 1),
                'Instalaciones_SalonDeFiestas'              => rand(0, 1),
                'Instalaciones_Sauna'                       => rand(0, 1),
                'Instalaciones_Solarium'                    => rand(0, 1),
                'Instalaciones_Tambo'                       => rand(0, 1),
                'Instalaciones_TanqueDeAgua'                => rand(0, 1),
                'Instalaciones_TanqueDeIncendio'            => rand(0, 1),
                'Instalaciones_Telefono'                    => rand(0, 1),
                'Instalaciones_Termotanque'                 => rand(0, 1),
                'Instalaciones_TratamientoEfluentes'        => rand(0, 1),
                'Instalaciones_Vivienda'                    => rand(0, 1),
                'Largo'                                     => rand(0, 1),
                'LateralDerechoIrregular'                   => rand(0, 1),
                'LateralIzquierdoIrregular'                 => rand(0, 1),
                'Local'                                     => rand(0, 1),
                'LongitudFondo'                             => rand(0, 1),
                'LongitudFrente'                            => rand(0, 1),
                'MedidaLinealDerecha'                       => rand(0, 1),
                'MedidaLinealIzquierda'                     => rand(0, 1),
                'MetrosDeLaEsquina'                         => rand(0, 1),
                'MontoExpensas'                             => rand(0, 1),
                'Ocupada'                                   => rand(0, 1),
                'PropiedadOcupada'                          => rand(0, 1),
                'RecaudacionMensual'                        => rand(0, 1),
                'Reciclado'                                 => rand(0, 1),
                'ReferenciaCercana'                         => rand(0, 1),
                'RentabilidadAnual'                         => rand(0, 1),
                'Servicios_ABL'                             => rand(0, 1),
                'Servicios_AguaCorriente'                   => rand(0, 1),
                'Servicios_Bar'                             => rand(0, 1),
                'Servicios_Calefaccion'                     => rand(0, 1),
                'Servicios_Cocina'                          => rand(0, 1),
                'Servicios_Conmutador'                      => rand(0, 1),
                'Servicios_Electricidad'                    => rand(0, 1),
                'Servicios_GasEnvasado'                     => rand(0, 1),
                'Servicios_GasNatural'                      => rand(0, 1),
                'Servicios_Internet'                        => rand(0, 1),
                'Servicios_Lavanderia'                      => rand(0, 1),
                'Servicios_Limpieza'                        => rand(0, 1),
                'Servicios_Refrigeracion'                   => rand(0, 1),
                'Servicios_Rentas'                          => rand(0, 1),
                'Servicios_RopaCama'                        => rand(0, 1),
                'Servicios_Seguridad'                       => rand(0, 1),
                'Servicios_Telefono'                        => rand(0, 1),
                'Servicios_Toallas'                         => rand(0, 1),
                'Servicios_Videocable'                      => rand(0, 1),
                'Servicios_Vigilancia'                      => rand(0, 1),
                'SuperficieConstruible'                     => rand(0, 1),
                'SuperficieCubierta'                        => rand(0, 1),
                'SuperficieCubiertaCasa'                    => rand(0, 1),
                'SuperficieDeposito'                        => rand(0, 1),
                'SuperficieDescubierta'                     => rand(0, 1),
                'SuperficieLocal'                           => rand(0, 1),
                'SuperficieOficina'                         => rand(0, 1),
                'SuperficiePlanta'                          => rand(0, 1),
                'SuperficiePlaya'                           => rand(0, 1),
                'SuperficieTerreno'                         => rand(0, 1),
                'SuperficieTotal'                           => rand(0, 1),
                'TerrenoPropio'                             => rand(0, 1),
                'UltimaActividad'                           => rand(0, 1),
                'VentaMercaderia'                           => rand(0, 1),
                'Vidriera'                                  => rand(0, 1),
                'Vivienda'                                  => rand(0, 1),
                'Zonificacion'                              => rand(0, 1),
                'fk_ficha2'                                 => $ficha2->idFicha2,
            ]);
            $ficha3->save();

            $ficha123 = new Ficha123([
                'fk_idFicha1' => $ficha1->idFicha1,
                'fk_idFicha2' => $ficha2->idFicha2,
                'fk_idFicha3' => $ficha3->idPropiedad,
            ]);
            $ficha123->save();
        }
    }
}
