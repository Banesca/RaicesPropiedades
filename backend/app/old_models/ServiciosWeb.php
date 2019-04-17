<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ServiciosWeb extends Model
{

    use SoftDeletes;

    protected $table      = 'tb_servicios_web';
    protected $primaryKey = 'idServicioWeb';

    protected $fillable = [
        'titulo',
        'descripcion',
        'foto',
        'fk_idStatus',
        'fk_idListaEmail',
        'fk_idListaTelefono',
    ];
}
