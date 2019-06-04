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
        'tocken',
        'sugerencia',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
        'fk_idStatusSistema',
    ];

    public function status() {
        return $this->belongsTo('App\StatusUser', 'fk_idStatusSistema')->select('descripcion');
    }

}
