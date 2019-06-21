<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ficha2 extends Model {
    use SoftDeletes;
    protected $table = 'tb_ficha2s';
    protected $primaryKey = 'idFicha2';

    protected $fillable = [
        'imagen1',
        'imagen2',
        'imagen3',
        'imagen4',
        'imagen5',
        'imagen6',
        'imagen7',
        'imagen_para_galeria',
        'fk_ficha1',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function ficha1() {
        return $this->belongsTo('App\Ficha1', 'fk_ficha1')->with('estadoPublicacion','tipoPropiedad');
    }
}
