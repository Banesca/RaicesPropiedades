<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoTechoIndustrial extends Model
{
    protected $table      = 'tb_tipo_techo_industriales';
    protected $primaryKey = 'idTipoTechoIndustrial';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];




}
