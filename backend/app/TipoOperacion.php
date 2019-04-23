<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipoOperacion extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_tipo_operacions';
    protected $primaryKey = 'idTipoOperaion';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
