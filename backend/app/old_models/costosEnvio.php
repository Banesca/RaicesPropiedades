<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class costosEnvio extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_costos_envios';
    protected $primaryKey = 'idCostoEnvio';

    protected $fillable = [
        'Codigo_Localidad',
        'Descripcion_Localidad',
        'Codigo_Zona',
        'Descripcion_Zona',
        'Codigo_Provincia',
        'Descripcion_Provincia',
        'Costo2',
    ];

}
