<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPorton extends Model
{
    protected $table      = 'tb_tipo_portones';
    protected $primaryKey = 'idTipoPorton';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
