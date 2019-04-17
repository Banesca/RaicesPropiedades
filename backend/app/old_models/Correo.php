<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Correo extends Model {
    use SoftDeletes;
    protected $table      = 'tb_correos';
    protected $primaryKey = 'idCorreo';

    protected $fillable = [
        'email',
        'password',
    ];

}
