<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincias extends Model
{
    protected $table      = 'tb_provincias';
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
