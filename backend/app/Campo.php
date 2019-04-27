<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campo extends Model {
    use SoftDeletes;
    protected $table      = 'tb_campos';
    protected $primaryKey = 'idCampo';

    protected $fillable = [
        'Direccion_Pais_Id',
        'Direccion_Provincia_Id',
        'Direccion_Partido_Id',
        'Direccion_Localidad_Id',
        'Direccion_Ciudad_Id',
        'Direccion_Barrio_Id',
        'Direccion_SubBarrio_Id1',
        'Direccion_Calle_Id',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'SuperficieCubierta',
        'SuperficieCubiertaCasa',
        'SuperficieDescubierta',
        'CantidadHectareas',
        'Ganaderia',
        'Agricultura',
        'CasaPrincipal',
        'CasaCaseros',
        'cupada',
        'fk_TipoCampo',
        'fk_Estado',
        'DistanciaPavimento',
        'Instalaciones_AguaCorriente',
        'Instalaciones_Aguadas',
        'Instalaciones_AguaPozo',
        'Instalaciones_Alambrados',
        'Instalaciones_Arboleda',
        'Instalaciones_Bebedero',
        'Instalaciones_Boxes',
        'Instalaciones_Bretes',
        'Instalaciones_Corral',
        'Instalaciones_Electricidad',
        'Instalaciones_Estacada',
        'Instalaciones_Forestacion',
        'Instalaciones_Fosas',
        'Instalaciones_Haras',
        'Instalaciones_LuzElectrica',
        'Instalaciones_Mangas',
        'Instalaciones_Molino',
        'Instalaciones_TratamientoEfluentes',
        'Instalaciones_Vivienda',
        'Instalaciones_AlambradoPerimetral',
        'Servicios_ABL',
        'Servicios_Electricidad',
        'Servicios_GasEnvasado',
        'Servicios_GasNatural',
        'Servicios_Rentas',
        'Generales_SeguroCaucion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
