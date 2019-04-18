<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoPropiedad extends Model {
    use SoftDeletes;
    protected $table      = 'tb_tipo_propiedades';
    protected $primaryKey = 'idTipoPropiedad';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
