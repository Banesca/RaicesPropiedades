<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quinta extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_departamento_tipo_casas';
    protected $primaryKey = 'idDeparTipoCasa';

    protected $fillable = [
        'AptoCredito',
        'Direccion_Pais_Id1',
        'Direccion_Provincia_Id1',
        'Direccion_Partido_Id1',
        'Direccion_Localidad_Id1',
        'Direccion_Ciudad_Id1',
        'Direccion_Barrio_Id1',
        'Direccion_SubBarrio_Id1',
        'Direccion_Calle_Id1',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'Casa_LongitudFrente',
        'Casa_LongitudFondo',
        'Casa_SuperficieTerreno',
        'Casa_SuperficieCubierta',
        'Casa_SuperficieDescubierta',
        'Casa_Antiguedad',
        'Casa_fk_Estado',
        'Casa_fk_TipoUnidad',
        'Casa_fk_TipoTecho',
        'Casa_fk_TipoPiso',
        'Casa_CantidadPlantas',
        'Casa_CantidadBanos',
        'Casa_CantidadAmbientes',
        'Casa_CantidadDormitorios',
        'Casa_CantidadCocheras',
        'Casa_fk_Orientacion',
        'Casa_fk_TipoCosta',
        'Casa_fk_TipoVista',
        'Casa_fk_TipoPendiente',
        'Casa_Servicios_ABL',
        'Casa_Servicios_AguaCorriente',
        'Casa_Servicios_Calefaccion',
        'Casa_Servicios_Conmutador',
        'Casa_Servicios_Electricidad',
        'Casa_Servicios_GasEnvasado',
        'Casa_Servicios_GasNatural',
        'Casa_Servicios_Internet',
        'Casa_Servicios_Refrigeracion',
        'Casa_Servicios_Rentas',
        'Casa_Servicios_Seguridad',
        'Casa_Servicios_Telefono',
        'Casa_Servicios_Videocable',
        'Casa_Servicios_Vigilancia',
        'Casa_Instalaciones_AguaCloaca',
        'Casa_Instalaciones_AguaCorriente',
        'Casa_Instalaciones_AireAcondicionadoCentral',
        'Casa_Instalaciones_AireAcondicionadoIndividual',
        'Casa_Instalaciones_AireCaliente',
        'Casa_Instalaciones_Amoblado',
        'Casa_Instalaciones_ArtefactosDeCocina',
        'Casa_Instalaciones_Ascensor',
        'Casa_Instalaciones_Cable',
        'Casa_Instalaciones_Caldera',
        'Casa_Instalaciones_Calefaccion',
        'Casa_Instalaciones_Desayunador',
        'Casa_Instalaciones_Electricidad',
        'Casa_Instalaciones_EspacioParaVehiculo',
        'Casa_Instalaciones_ExtractorDeAire',
        'Casa_Instalaciones_GasEnvasado',
        'Casa_Instalaciones_GasNatural',
        'Casa_Instalaciones_HogarALena',
        'Casa_Instalaciones_LosaRadiante',
        'Casa_Instalaciones_MueblesDeCocina',
        'Casa_Instalaciones_Pileta',
        'Casa_Instalaciones_Radiadores',
        'Casa_Instalaciones_Termotanque',
        'Casa_Ambientes_Altillo',
        'Casa_Ambientes_AnteCocina',
        'Casa_Ambientes_Antesala',
        'Casa_Ambientes_Azotea',
        'Casa_Ambientes_Balcon',
        'Casa_Ambientes_Bano',
        'Casa_Ambientes_Bar',
        'Casa_Ambientes_Baulera',
        'Casa_Ambientes_Biblioteca',
        'Casa_Ambientes_Bodega',
        'Casa_Ambientes_Cochera',
        'Casa_Ambientes_Cocina',
        'Casa_Ambientes_CocinaComedor',
        'Casa_Ambientes_CocinaKitchinette',
        'Casa_Ambientes_Comedor',
        'Casa_Ambientes_ComedorDiario',
        'Casa_Ambientes_CuartoDeHerramientas',
        'Casa_Ambientes_CuartoDePlanchar',
        'Casa_Ambientes_Dependencia',
        'Casa_Ambientes_DependenciaDeServicio',
        'Casa_Ambientes_Dormitorio',
        'Casa_Ambientes_Entrepiso',
        'Casa_Ambientes_Estudio',
        'Casa_Ambientes_FamilyRoom',
        'Casa_Ambientes_Galeria',
        'Casa_Ambientes_Galpon',
        'Casa_Ambientes_Garage',
        'Casa_Ambientes_Hall',
        'Casa_Ambientes_Jardin',
        'Casa_Ambientes_Lavadero',
        'Casa_Ambientes_Living',
        'Casa_Ambientes_LivingComedor',
        'Casa_Ambientes_Local',
        'Casa_Ambientes_Oficina',
        'Casa_Ambientes_Palier',
        'Casa_Ambientes_Patio',
        'Casa_Ambientes_Playroom',
        'Casa_Ambientes_Quincho',
        'Casa_Ambientes_Sala',
        'Casa_Ambientes_Sotano',
        'Casa_Ambientes_Suite',
        'Casa_Ambientes_Terraza',
        'Casa_Ambientes_Toilette',
        'Casa_Ambientes_Vestibulo',
        'Casa_Ambientes_Vestidor',
        'Casa_Ambientes_Vestuario',
        'Instalaciones_CanchaDeBasquet',
        'Instalaciones_CanchaDeFutbol',
        'Instalaciones_CanchaDeHockey',
        'Instalaciones_CanchaDePaddle',
        'Instalaciones_CanchaDePaleta',
        'Instalaciones_CanchaDeSquash',
        'Instalaciones_CanchaDeTenis',
        'Instalaciones_CanchaDeVoley',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];






























































































































}
