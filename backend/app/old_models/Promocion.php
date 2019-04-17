<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_promociones';
    protected $primaryKey = 'idPromo';

    protected $fillable = [
        'nombre',
        'titulo',
        'urlImage',
        'promocion',
        'categoria',
        'fk_listaPesos',
    ];
}
