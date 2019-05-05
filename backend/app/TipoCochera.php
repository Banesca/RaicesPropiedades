<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCochera extends Model
{
    protected $table      = 'tb_tipo_cocheras';
    protected $primaryKey = 'idTipoCochera';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
