<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{

    protected $table      = 'tb_monedas';
    protected $primaryKey = 'idMonedas';

    protected $fillable = [
        'moneda',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
