<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cochera extends Model {
    use SoftDeletes;
    protected $table      = 'tb_cocheras';
    protected $primaryKey = 'Direccion_Pais_Id';

    protected $fillable = [
        'Direccion_Provincia_Id',
        'Direccion_Partido_Id',
        'Direccion_Localidad_Id',
        'Direccion_Ciudad_Id',
        'Direccion_Barrio_Id',
        'Direccion_SubBarrio_Id',
        'Direccion_Calle_Id',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'Largo',
        'Ancho',
        'Altura',
        'SuperficieCubierta',
        'SuperficieDescubierta',
        'fk_TipoCobertura',
        'fk_TipoCoche',
        'fk_TipoCochera',
        'fk_TipoAcceso',
        'cupada',
        'Baulera',
        'Generales_SeguroCaucion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];


}
