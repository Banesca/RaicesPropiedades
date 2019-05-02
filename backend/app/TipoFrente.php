<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoFrente extends Model
{
    protected $table      = 'tb_tipo_frentes';
    protected $primaryKey = 'idTipoFrente';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
