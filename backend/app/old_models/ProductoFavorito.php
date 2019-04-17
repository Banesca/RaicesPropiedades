<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoFavorito extends Model
{
    use SoftDeletes;

    protected $table = 'tb_productos_favoritos';

    protected $primaryKey = 'idProductosFavoritos';

    protected $fillable = [
        'fk_idPerfilCliente',
        'fk_idProducto'
    ];

    public function cliente(){
        return $this->belongsTo('App\PerfilCliente', 'fk_idPerfilCliente');
    }

    public function producto(){
        return $this->belongsTo('App\Producto', 'fk_idProducto');
    }
    
}
