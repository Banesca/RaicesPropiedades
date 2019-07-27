<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrio extends Model
{
    protected $table      = 'tb_barrios';
    protected $primaryKey = 'idBarrio';

    protected $fillable = [
        'descripcion',
        'fk_idLocalidad',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function localidad()
    {
        return $this->belongsTo('App\Localidad', 'fk_idLocalidad');
    }
}
