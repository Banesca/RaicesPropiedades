<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDeFactura extends Model {

    protected $table      = 'tb_tipo_de_facturas';
    protected $primaryKey = 'idTipoFactura';

    protected $fillable = [
        'descripcion',
    ];

}
