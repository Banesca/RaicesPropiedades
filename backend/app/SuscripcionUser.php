<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SuscripcionUser extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_suscripcion_users';
    protected $primaryKey = 'idSuscripcionUser';

    protected $fillable = [
        'titulo',
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
