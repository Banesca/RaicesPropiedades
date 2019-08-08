<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regiones extends Model
{
    protected $table      = 'tb_regiones';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'fk_pais'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
