<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class clasificado_reclamo extends Model
{
    use SoftDeletes;
    protected $table = 'tb_clasificado_reclamos';

    protected $primaryKey = 'idClasificadoReclamo';

    protected $fillable = [
        'nombre',
        'fk_idStatusReclamo',
    ];

}
