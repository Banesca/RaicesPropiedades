<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoEdificio extends Model
{
    protected $table      = 'tb_tipo_edificios';
    protected $primaryKey = 'idTipoEdificio';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
