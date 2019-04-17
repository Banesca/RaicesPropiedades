<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CarritoCompra extends Model
{
    use SoftDeletes;
    protected $table = 'tb_carrito_compras';

    protected $primaryKey = 'idCarrito';

    protected $fillable = [
        'descripcion',
        'precio',
        'cantidad',
        'total',
        'fk_idUser',
        'fk_idProducto',
    ];

    public function productos()
    {
        return $this->hasMany('App\Prducto', 'fk_idProducto','idCarrito');
    }
}
