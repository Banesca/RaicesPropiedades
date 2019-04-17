<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable {
    use HasApiTokens, Notifiable;

    protected $table = 'tb_users';

    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'userName',
        'email',
        'fk_statusUser',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'tockenActivarCuenta',
        'created_at',
        'updated_at',
        'deleted_at',
    ];


    protected $dates = [ 'created_at', 'deleted_at' ];

    public function generateToken() {
        $this->api_token = str_random(60);
        $this->save();

        return $this->api_token;
    }

    public function generateTokenActivacion() {
        $this->tockenActivarCuenta = str_random(30);
        $this->statusUser          = 0;
        $this->save();

        return $this->tockenActivarCuenta;
    }

    /* public function perfil() {
         return $this->belongsTo('App\Perfil', 'fk_idPerfil');
     }*/

    public function statusUser() {
        return $this->belongsTo('App\StatusUser', 'fk_statusUser');
    }

    /*public function ReclamosSugerencias() {
         return $this->hasMany('App\ReclamosYSugerencia', 'fk_idUser'); //muchos reclamos
     }

     public function notificacionPorUser() {
         return $this->hasMany('App\NotificacionPorUser', 'idUser');
     }*/


}
