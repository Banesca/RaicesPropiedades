<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReclamosYSugerencia extends Model {

    use SoftDeletes;
    protected $table      = 'tb_reclamos_y_sugerencias';
    protected $primaryKey = 'idReclamosSugerencia';

    protected $fillable = [
        'titulo',
        'descripcion',
        'numero_ticket',
        'fk_idUser',
        'fk_idStatusReclamo',

        'motivo_cierre',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function status() {
        return $this->belongsTo('App\StatusReclamo', 'fk_idStatusReclamo');
    }


}
