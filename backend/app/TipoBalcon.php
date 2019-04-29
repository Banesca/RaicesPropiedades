<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoBalcon extends Model {
    protected $table      = 'tb_tipo_balcones';
    protected $primaryKey = 'idBalcon';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
