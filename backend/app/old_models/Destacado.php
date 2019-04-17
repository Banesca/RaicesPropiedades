<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Destacado extends Model
{

    use SoftDeletes;
    protected $table = 'tb_destacados';
    protected $primaryKey = 'id_Destacado';

    protected $fillable = [
        'descripcion',
        'fk_idProducto',

        'orden', //se ordena de manera ASC
    ];

    public function producto()
    {
        return $this->belongsTo('App\Producto', 'fk_idProducto');
    }
}
