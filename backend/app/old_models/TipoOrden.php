<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoOrden extends Model {

    protected $table      = 'tb_tipo_ordenes';
    protected $primaryKey = 'idTipoOrden';

    protected $fillable = [
        'descripcion',
    ];


}
