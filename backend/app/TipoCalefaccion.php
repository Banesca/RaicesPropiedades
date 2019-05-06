<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCalefaccion extends Model {
    protected $table      = 'tb_tipo_calefacciones';
    protected $primaryKey = 'idTipoCalefaccion';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
