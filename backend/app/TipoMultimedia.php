<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoMultimedia extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_tipo_multimedia';
    protected $primaryKey = 'idTipoMultimedia';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
