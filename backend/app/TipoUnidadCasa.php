<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoUnidadCasa extends Model
{
    protected $table      = 'tb_tipo_unidad_casas';
    protected $primaryKey = 'idTipoUnidadCasa';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
