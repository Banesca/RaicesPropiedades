<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    protected $table      = 'tb_localidades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'fk_partido'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
