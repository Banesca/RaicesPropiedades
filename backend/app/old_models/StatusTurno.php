<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusTurno extends Model {
    use SoftDeletes;

    protected $table      = 'tb_status_turnos';
    protected $primaryKey = 'idStatusTurno';

    protected $fillable = [
        'descripcion',
    ];

}
