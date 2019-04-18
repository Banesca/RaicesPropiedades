<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modulo extends Model {
    use SoftDeletes;
    protected $table      = 'tb_modulos';
    protected $primaryKey = 'idM';

    protected $fillable = [
        'modulo',
        'descripcion',
        'url',
        'iconomodulo',

    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
