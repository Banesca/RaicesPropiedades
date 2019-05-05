<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBaño extends Model
{
    protected $table      = 'tb_tipo_baños';
    protected $primaryKey = 'idTipoBaño';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
