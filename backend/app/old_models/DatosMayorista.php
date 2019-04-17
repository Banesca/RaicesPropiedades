<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DatosMayorista extends Model
{
    use SoftDeletes;
    protected $table = 'tb_datos_mayoristas';
    protected $primaryKey = 'idDatosMayorista';
    protected $fillable = [
        'NOMBRE_LOCAL_MAYORISTA',
        'DOMICILIO_LOCAL_MAYORISTA',
        'TELEFONO_LOCAL_MAYORISTA',
        'TELEFONO_USER',
        'fk_idUser',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }
}
