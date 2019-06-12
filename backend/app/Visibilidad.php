<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Visibilidad extends Model
{
    protected $table      = 'tb_visibilidades';
    protected $primaryKey = 'idVisibilidad';

    protected $fillable = [
        'MontoOperacion',
        'fk_moneda_id',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
