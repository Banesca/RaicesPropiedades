<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suscripcion extends Model {
    use SoftDeletes;
    protected $table      = 'tb_suscripcions';
    protected $primaryKey = 'idSuscripcion';

    protected $fillable = [
        'email',
        'motivoDeCancelacion',
        'fk_idStatusSistema',
        'tocken',
        'sugerencia',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];


}
