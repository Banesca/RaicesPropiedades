<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoHotel extends Model {
    protected $table      = 'tb_tipo_hoteles';
    protected $primaryKey = 'idTipoHotel';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
