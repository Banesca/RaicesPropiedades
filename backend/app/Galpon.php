<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Galpon extends Model
{
    use SoftDeletes;
    protected $table = 'tb_estado_publicacions';
    protected $primaryKey = 'idEstadoPublicaion';

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
        'SuperficieCubierta',
        'SuperficieDescubierta',
        'SuperficiePlaya',
        'LongitudFrente',
        'LongitudFondo',
        'Antiguedad',
        'fk_Estado',
        'CantidadBanos',
        'CantidadOficinas',
        'fk_TipoTechoIndustrial',
        'fk_TipoPorton',
        'GeneradorPropio',
        'fk_TipoCalefaccion',
        'AnchoEntrada',
        'AltoEntrada',
        'CantidadColumnas',
        'CantidadNaves',
        'Ocupada',
        'CantidadPlantas',
        'AlturaTecho',
        'FOT',
        'Instalaciones_AguaCorriente',
        'Instalaciones_AireAcondicionadoCentral',
        'Instalaciones_AireAcondicionadoIndividual',
        'Instalaciones_Balanza',
        'Instalaciones_Bombeador',
        'Instalaciones_Caldera',
        'Instalaciones_Electricidad',
        'Instalaciones_FuerzaMotriz',
        'Instalaciones_GasEnvasado',
        'Instalaciones_GasIndustrial',
        'Instalaciones_GasNatural',
        'Instalaciones_Grua',
        'Instalaciones_GrupoElectrogeno',
        'Instalaciones_InstalacionParrilla',
        'Instalaciones_LuzElectrica',
        'Instalaciones_Montacarga',
        'Instalaciones_Motores',
        'Instalaciones_Porton',
        'Instalaciones_TanqueDeAgua',
        'Instalaciones_TanqueDeIncendio',
        'Instalaciones_Telefono',
        'Instalaciones_Termotanque',
        'Instalaciones_Vivienda',
        'Servicios_ABL',
        'Servicios_AguaCorriente',
        'Servicios_Electricidad',
        'Servicios_GasEnvasado',
        'Servicios_GasNatural',
        'Servicios_Internet',
        'Servicios_Refrigeracion',
        'Servicios_Rentas',
        'Servicios_Seguridad',
        'Servicios_Telefono',
        'Servicios_Videocable',
        'Servicios_Vigilancia',
        'Generales_SeguroCaucion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
