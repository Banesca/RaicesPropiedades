<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PerfilCliente extends Model
{
    use SoftDeletes;

    protected $table = 'tb_perfil_clientes';

    protected $primaryKey = 'idPerfilCliente';

    protected $fillable = [
        'nombreComercio',
        'nombre',
        'apellido',
        'documento_dni',
        'documento_otro',
        'correo',
        'telefono',
        'celular',
        'fk_idPerfilCliente', //id del cliente
        'domicilio_entrega',
        'fk_idTipoFactura', //opcional
        'CUIT',             //opcional
        'CUITrazonSocial',  //opcional
        'CUITDomicilioFidcal', //opcional

        'celular_codigo',
        'celular_area',
        'telefono_codigo',
        'telefono_area',
    ];

    protected $dates = [ 'created_at', 'deleted_at' ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idPerfilCliente');
    }

    public function domicilios()
    {
        return $this->hasMany('App\Domicilio', 'fk_idPerfilCliente', 'idPerfilCliente');
    }
}
