<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PesoProducto extends Model {

    use SoftDeletes;
    protected $table      = 'tb_pesos_productos';
    protected $primaryKey = 'idPesoProducto';

    protected $fillable = [
        'peso',
        'fk_idProducto',
    ];
}
