<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCoche extends Model
{
    protected $table      = 'tb_tipo_coches';
    protected $primaryKey = 'idTipoCoche';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
