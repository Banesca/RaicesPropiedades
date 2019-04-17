<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class metodoEntregaValues extends Model
{
    protected $table      = 'tb_metodo_entrega_values';
    protected $primaryKey = 'idMetodoEntregaValue';

    protected $fillable = [
        'descripcion',
    ];


}
