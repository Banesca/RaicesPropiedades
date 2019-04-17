<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderHeader extends Model
{
    //
    use SoftDeletes;

    protected $table = 'tb_order_header';

    protected $primaryKey = 'idOrderHeader';

    protected $fillable = [
        'Fecha_Pedido',
        'Numero_Pedido',
        'Numero_EncabezadoVenta',
        'Estado_Pedido',
        'Domicilio_Entrega',
        'Codigo_Postal',
        'stars',
        'comentaryClient',
        'Email_Cliente',
        'fk_idStateOrder',
        'fk_idUserClient',
        'fk_idUserDriver',
        'metodoEntrega',
        'disponibilidadHr',

        'metodoPago',
        'comprobanteDepositoTransferencia',
        'fk_idTipoFactura',
        'localidad',
        'firma1',
        'firma2',
        'comentarioFinal',
        'monto_total',
        'idCouponsKf',
        'isPay',
        'fecha_retiro',
        'fecha',
        'personasAutorizadas',
        'observaciones',
        'direccion',
        'DNIautorizado',

        'tipoIdentidad',
        'provincia',
        'telefonoAutorizado',
        'celularAutorizado',
        'pasarpoteAutorizado',
    ];

    public function state()
    {
        return $this->belongsTo('App\StateOrder', 'fk_idStateOrder');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUserClient');
    }

    public function tipoFactura()
    {
        return $this->belongsTo('App\TipoDeFactura', 'fk_idTipoFactura');
    }

    public function orderBody()
    {
        return $this->hasMany('App\orderBody', 'fk_idOrderHeader', 'idOrderHeader');
    }
}
