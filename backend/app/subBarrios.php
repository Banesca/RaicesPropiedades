<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subBarrios extends Model
{
    protected $table      = 'tb_sub_barrios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'fk_barrio'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
