<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ModulosDelUser extends Model {
    use SoftDeletes;
    protected $table      = 'tb_modulos_del_users';
    protected $primaryKey = 'idModuloUser';

    protected $fillable = [
        'fk_idUser',
        'fk_idModulo',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function user() {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function modulo() {
        return $this->belongsTo('App\Modulo', 'fk_idModulo');
    }

}
