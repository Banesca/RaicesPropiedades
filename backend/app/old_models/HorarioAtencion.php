<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HorarioAtencion extends Model
{
    use SoftDeletes;

    protected $table = 'tb_horario_atencions';

    protected $primaryKey = 'idHorarioAtencion';

    protected $fillable = [
        'desde',
        'hasta',
        'TipoDe',
        'TipoDeDia',
        'dias',
        'isRegular',
    ];
}
