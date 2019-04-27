<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orientacion extends Model {
    protected $table      = 'tb_orientaciones';
    protected $primaryKey = 'idOrientacion';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
