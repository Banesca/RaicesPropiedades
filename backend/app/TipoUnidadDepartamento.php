<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidadDepartamento extends Model {
    protected $table      = 'tb_tipo_unidad_departamentos';
    protected $primaryKey = 'idTipoUnidadDepartamento';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
