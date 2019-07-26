<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contacto extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_contactos';
    protected $primaryKey = 'idContacto';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

}
