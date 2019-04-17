<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perfil extends Model {

    use SoftDeletes;
    protected $table = 'tb_perfil';
    protected $primaryKey = 'idPerfil';

    protected $fillable = [
        'nombre',
        'descripcion',
    ];


    public function user()
    {
        return $this->hasOne('App\User','fk_idPerfil','idPerfil');
    }
}
