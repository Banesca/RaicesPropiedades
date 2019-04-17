<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Oferta extends Model {

    use SoftDeletes;
    protected $table      = 'tb_ofertas';
    protected $primaryKey = 'idOferta';

    protected $fillable = [
        'titulo',
        'tiempoExpi',
        'imagen',
        'status',

        'base_cond',
        'activar_uso',
        'idProducto'
    ];

    public function producto(){
        return $this->belongsTo('App\Producto','idProducto');
    }
}
