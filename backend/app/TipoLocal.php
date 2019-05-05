<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoLocal extends Model
{
    protected $table      = 'tb_tipo_locales';
    protected $primaryKey = 'idTipoLocal';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
