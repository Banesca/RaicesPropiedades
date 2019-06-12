<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{

    protected $table      = 'tb_transacciones';
    protected $primaryKey = 'idTransacciones';

    protected $fillable = [
        'nombre_apellido',
        'telefono',
        'fk_tipoPropiedad',
        'titulo',
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}