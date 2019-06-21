<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EstadoPublicacion extends Model {
    protected $table = 'tb_estado_publicacions';
    protected $primaryKey = 'idEstadoPublicaion';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


}
