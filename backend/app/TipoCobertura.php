<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCobertura extends Model
{
    protected $table      = 'tb_tipo_coberturas';
    protected $primaryKey = 'idTipoCobertura';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
