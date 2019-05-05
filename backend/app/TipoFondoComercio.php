<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFondoComercio extends Model {
    protected $table      = 'tb_tipo_fondo_comercios';
    protected $primaryKey = 'idTipoFondoComercio';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];


}
