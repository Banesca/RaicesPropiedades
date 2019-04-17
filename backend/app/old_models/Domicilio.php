<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Domicilio extends Model
{
    use SoftDeletes;

    protected $table = 'tb_domicilios';

    protected $primaryKey = 'idDomicilios';

    protected $fillable = [
        'descripcion',
        'fk_idCliente',
        'provincia',
        'localidad',

        'nombre',
        'codigo_postal',
        'telefono_fijo',
        'observaciones',
    ];

    public function Cliente()
    {
        return $this->belongsTo('App\User', 'fk_idCliente');
    }
}
