<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RazonSocial extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_razon_socials';
    protected $primaryKey = 'idRazonSocial';

    protected $fillable = [
        'tipoFactura',
        'descripcion',
        'domicilio_fiscal',
        'cuit',
        'fk_idCliente',

        'sucursal',
        'nombre_apellido',
        'dni',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idCliente');
    }
}
