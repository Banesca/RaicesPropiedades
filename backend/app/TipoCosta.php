<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCosta extends Model {
    protected $table      = 'tb_tipo_costas';
    protected $primaryKey = 'idTipoCosta';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
