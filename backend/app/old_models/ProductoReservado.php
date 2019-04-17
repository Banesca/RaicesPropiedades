<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductoReservado extends Model
{
    use SoftDeletes;

    protected $table = 'tb_productos_reservados';

    protected $primaryKey = 'idPR';

    protected $fillable = [
        'fk_idProducto',
        'fk_idUser',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'fk_idProducto');
    }
}
