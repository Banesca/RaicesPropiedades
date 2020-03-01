<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_pagos';
    protected $primaryKey = 'idPago';

    protected $fillable = [
        'nombre',
        'apellido',
        'n_transferencia_deposito',
        'detalle',
        'dir_adjunto',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
