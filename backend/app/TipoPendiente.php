<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoPendiente extends Model
{
    protected $table      = 'tb_tipo_pendientes';
    protected $primaryKey = 'idTipoPendiente';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
