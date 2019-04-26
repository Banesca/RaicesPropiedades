<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Casa extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_casas';
    protected $primaryKey = 'idCasa';

    protected $fillable = [
        'Direccion_Pais_Id',
        'Direccion_Provincia_Id',
        'Direccion_Partido_Id',
        'Direccion_Localidad_Id',
        'Direccion_Ciudad_Id',
        'Direccion_Barrio_Id',
        'Direccion_SubBarrio_Id',
        'Direccion_Calle_Id',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'LongitudFrente',
        'LongitudFondo',
        'SuperficieTerreno',
        'SuperficieCubierta',
        'SuperficieDescubierta',
        'Antiguedad',
        'fk_Estado',
        'fk_TipoUnidad',
        'fk_TipoTecho',
        'fk_TipoPiso',
        'CantidadPlantas',
        'CantidadBanos',
        'CantidadAmbientes',
        'CantidadDormitorios',
        'CantidadCocheras',
        'fk_Orientacion',
        'fk_TipoCosta',
        'fk_TipoVista',
        'fk_TipoPendiente',
        'AptoCredito',
        'Servicios_ABL',
        'Servicios_AguaCorriente',
        'Servicios_Calefaccion',
        'Servicios_Conmutador',
        'Servicios_Electricidad',
        'Servicios_GasEnvasado',
        'Servicios_GasNatural',
        'Servicios_Internet',
        'Servicios_Limpieza',
        'Servicios_Refrigeracion',
        'Servicios_Rentas',
        'Servicios_RopaCama',
        'Servicios_Seguridad',
        'Servicios_Toallas',
        'Servicios_Telefono',
        'Servicios_Videocable',
        'Servicios_Vigilancia',
        'Instalaciones_AguaCloaca',
        'Instalaciones_AguaCorriente',
        'Instalaciones_AireAcondicionadoCentral',
        'Instalaciones_AireAcondicionadoIndividual',
        'Instalaciones_AireCaliente',
        'Instalaciones_Amoblado',
        'Instalaciones_ArtefactosDeCocina',
        'Instalaciones_Ascensor',
        'Instalaciones_Cable',
        'Instalaciones_CajaFuerte',
        'Instalaciones_Caldera',
        'Instalaciones_Calefaccion',
        'Instalaciones_CanchaFutbol',
        'Instalaciones_CanchaTenis',
        'Instalaciones_Desayunador',
        'Instalaciones_Electricidad',
        'Instalaciones_EspacioParaVehiculo',
        'Instalaciones_ExtractorDeAire',
        'Instalaciones_GasEnvasado',
        'Instalaciones_GasNatural',
        'Instalaciones_Hidromasaje',
        'Instalaciones_HogarALena',
        'Instalaciones_LosaRadiante',
        'Instalaciones_MueblesDeCocina',
        'Instalaciones_MovilidadReducida',
        'Instalaciones_Pavimento',
        'Instalaciones_Pileta',
        'Instalaciones_Radiadores',
        'Instalaciones_Termotanque',
        'Generales_PermiteMascotas',
        'Generales_SeguroCaucion',
        'Ambientes_Altillo',
        'Ambientes_AnteCocina',
        'Ambientes_Antesala',
        'Ambientes_Azotea',
        'Ambientes_Balcon',
        'Ambientes_Bano',
        'Ambientes_Bar',
        'Ambientes_Baulera',
        'Ambientes_Biblioteca',
        'Ambientes_Bodega',
        'Ambientes_Cochera',
        'Ambientes_Cocina',
        'Ambientes_CocinaComedor',
        'Ambientes_CocinaKitchinette',
        'Ambientes_Comedor',
        'Ambientes_ComedorDiario',
        'Ambientes_CuartoDeHerramientas',
        'Ambientes_CuartoDePlanchar',
        'Ambientes_Dependencia',
        'Ambientes_DependenciaDeServicio',
        'Ambientes_Dormitorio',
        'Ambientes_Entrepiso',
        'Ambientes_Estudio',
        'Ambientes_FamilyRoom',
        'Ambientes_Galeria',
        'Ambientes_Galpon',
        'Ambientes_Garage',
        'Ambientes_Hall',
        'Ambientes_Jardin',
        'Ambientes_Lavadero',
        'Ambientes_Living',
        'Ambientes_LivingComedor',
        'Ambientes_Local',
        'Ambientes_Oficina',
        'Ambientes_Palier',
        'Ambientes_Patio',
        'Ambientes_Playroom',
        'Ambientes_Quincho',
        'Ambientes_Sala',
        'Ambientes_Sotano',
        'Ambientes_Suite',
        'Ambientes_Terraza',
        'Ambientes_Toilette',
        'Ambientes_Vestibulo',
        'Ambientes_Vestidor',
        'Ambientes_Vestuario',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
































































































































}
