<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigGeneral extends Model {
    use SoftDeletes;
    protected $table      = 'tb_config_general';
    protected $primaryKey = 'idConfigGeneral';

    protected $fillable = [
        'quienesSomos',
        'direccion',
        'celular1',
        'celular2',
        'correo',
        'url_face',
        'url_intagram',
        'url_twitter',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
