<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoExpensas extends Model {
    protected $table      = 'tb_tipo_expensas';
    protected $primaryKey = 'idTipoExpensa';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
