<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoAscensor extends Model
{
    protected $table      = 'tb_tipo_ascensores';
    protected $primaryKey = 'idTipoAscensor';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
