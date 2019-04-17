<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PreguntasFrecuente extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_preguntas_frecuentes';
    protected $primaryKey = 'idPreguntaFrecuente';

    protected $fillable = [
        'pregunta',
        'respuesta',
        'fk_idUser',
        'fk_idStatusSistema',
    ];


    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }
    public function statu()
    {
        return $this->belongsTo('App\StatusSistema', 'fk_idStatusSistema');
    }

}
