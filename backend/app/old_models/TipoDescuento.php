<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoDescuento extends Model {
    
    protected $table      = 'tb_tipo_descuentos';
    protected $primaryKey = 'idTipoDescuento';

    protected $fillable = [
        'descripcion',
    ];

}
