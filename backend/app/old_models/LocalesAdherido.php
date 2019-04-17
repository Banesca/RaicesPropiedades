<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LocalesAdherido extends Model {
    use SoftDeletes;
    protected $table      = 'tb_locales_adheridos';
    protected $primaryKey = 'idLocalAdherido';

    protected $fillable = [
        'fk_idClasificado',
        'nombre',
        'descripcion',
        'foto_1',
        'foto_2',
        'fk_idUser',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function turno(){
        return $this->hasOne('App\turno','fk_idLocalAdherido','idLocalAdherido');
    }

}
