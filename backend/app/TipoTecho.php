<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTecho extends Model {
    protected $table      = 'tb_tipo_techos';
    protected $primaryKey = 'idTipoTecho';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
