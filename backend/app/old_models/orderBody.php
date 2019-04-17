<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class orderBody extends Model {

    use SoftDeletes;
    protected $table = 'tb_order_body';

    protected $primaryKey = 'idOrderBody';

    protected $fillable = [
        'fk_idOrderHeader',
        'codeProdSys',
        'Cantidad_Producto',
        'PrecioUnitario_Producto',
        'PorcentajeDescuento_Producto',
        'Devolucion_Producto',
        'Numero_EncabezadoVenta',
        'fk_idProducto',
    ];

    public function orderHeader() {
        return $this->belongsTo('App\orderHeader', 'fk_idOrderHeader');
    }

    public function producto() {
        return $this->belongsTo('App\Producto', 'fk_idProducto');
    }
}
