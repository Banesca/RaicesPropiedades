<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAcceso extends Model
{
    protected $table      = 'tb_tipo_accesos';
    protected $primaryKey = 'idTipoAcceso';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
