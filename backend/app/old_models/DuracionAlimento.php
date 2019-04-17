<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DuracionAlimento extends Model
{

    protected $table      = 'tb_duracion_alimentos';
    protected $primaryKey = 'idDuracionAlimentos';

    protected $fillable = [
        'duracion',
        'fk_idUser',
        'fk_idProducto',
        'fechaNotificacion',
    ];

    public function user ()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }
}
