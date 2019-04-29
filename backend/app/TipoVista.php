<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoVista extends Model
{
    protected $table      = 'tb_tipo_vistas';
    protected $primaryKey = 'idTipoVista';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
