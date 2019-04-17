<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonaAutorizada extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_personas_autorizadas';
    protected $primaryKey = 'idPersonaAutorizada';

    protected $fillable = [
        'tipoIdentidad',
        'identidad',
        'telefono',
        'celular',
        'fk_idUserCliente',

        'nombre_apellido',
    ];


    public function user() {
        return $this->belongsTo('App\User', 'fk_idUserCliente');
    }
}
