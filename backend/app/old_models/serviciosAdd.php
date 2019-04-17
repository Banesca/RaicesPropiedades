<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class serviciosAdd extends Model {
    use SoftDeletes;

    protected $table      = 'tb_servicios_add';
    protected $primaryKey = 'idServiciosAdd';

    protected $fillable = [
        'fk_idClasificado',
        'fk_idLocal',
        'fechaHora',
        'status',
        'fk_idUser',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function clasificado()
    {
        return $this->belongsTo('App\Clasificado', 'fk_idClasificado');
    }

}
