<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoPropiedad extends Model
{
    protected $table = 'tb_estado_propiedades';
    protected $primaryKey = 'idEstadoPropiedad';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
