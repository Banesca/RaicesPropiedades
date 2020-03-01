<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calle extends Model
{
    protected $table = 'tb_calles';

    protected $primaryKey = 'idCalle';

    protected $fillable = [
        'idCalle',
        'nombre',
        'fk_localidad',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
