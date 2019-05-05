<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTerreno extends Model
{
    protected $table      = 'tb_tipo_terrenos';
    protected $primaryKey = 'idTipoTerreno';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
