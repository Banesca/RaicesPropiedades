<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Terreno extends Model {
    use SoftDeletes;
    protected $table      = 'tb_sucursals';
    protected $primaryKey = 'idTerreno';

    protected $fillable = [
        'Direccion_Pais_Id1',
        'Direccion_Provincia_Id1',
        'Direccion_Partido_Id1',
        'Direccion_Localidad_Id1',
        'Direccion_Ciudad_Id1',
        'Direccion_Barrio_Id1',
        'Direccion_Subbarrio_Id',
        'Direccion_Calle_Id1',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'SuperficieTotal',
        'SuperficieConstruible',
        'cupada',
        'Demolicion',
        'FondoIrregular',
        'FrenteIrregular',
        'LateralDerechoIrregular',
        'LateralIzquierdoIrregular',
        'MedidaLinealDerecha',
        'MedidaLinealIzquierda',
        'LongitudFrente',
        'LongitudFondo',
        'fk_Estado',
        'fk_TipoTerreno',
        'fk_TipoCosta',
        'fk_TipoPendiente',
        'fk_TipoVista',
        'FOT',
        'Zonificacion',
        'Instalaciones_AguaCloaca',
        'Instalaciones_AguaCorriente',
        'Instalaciones_AguaPozo',
        'Instalaciones_Alambrados',
        'Instalaciones_Arboleda',
        'Instalaciones_Bebedero',
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
        'Instalaciones_Pavimento',
        'Instalaciones_Potrero',
        'Instalaciones_Tambo',
        'Instalaciones_Vivienda',
        'Servicios_ABL',
        'Servicios_AguaCorriente',
        'Servicios_Electricidad',
        'Servicios_GasEnvasado',
        'Servicios_GasNatural',
        'Servicios_Rentas',
        'Servicios_Telefono',
        'Generales_SeguroCaucion'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];


}
