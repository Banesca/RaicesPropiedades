<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTasacion extends Model
{
    protected $table      = 'tb_tipo_tasaciones';
    protected $primaryKey = 'idTipoTasaccion';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
