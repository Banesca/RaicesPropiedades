<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPiso extends Model {
    protected $table      = 'tb_tipo_pisos';
    protected $primaryKey = 'idTipoPiso';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
