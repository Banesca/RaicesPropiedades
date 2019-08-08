<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    protected $table      = 'tb_partidos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'fk_provincia'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
