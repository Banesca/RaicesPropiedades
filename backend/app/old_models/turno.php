<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class turno extends Model
{
    use SoftDeletes;
    protected $table = 'tb_turnos';

    protected $primaryKey = 'idTurnos';

    protected $fillable = [
        'fk_idClasificado',
        'fk_idLocalAdherido',
        'fechaHora',
        'fk_idStatusTurnos',
        'fk_idUser',
    ];

    public function clasificado()
    {
        return $this->belongsTo('App\Clasificado', 'fk_idClasificado');
    }

    public function localAdherido()
    {
        return $this->belongsTo('App\LocalesAdherido', 'fk_idLocalAdherido');
    }

    public function statusTurno()
    {
        return $this->belongsTo('App\StatusTurno', 'fk_idStatusTurnos');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

}
