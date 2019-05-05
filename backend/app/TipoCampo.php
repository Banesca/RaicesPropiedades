<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoCampo extends Model
{
    protected $table      = 'tb_tipo_campos';
    protected $primaryKey = 'idTipoCampo';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];



}
