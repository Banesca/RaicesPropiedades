<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table      = 'tb_paises';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
