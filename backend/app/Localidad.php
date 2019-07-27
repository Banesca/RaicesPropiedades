<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
    protected $table      = 'tb_localidads';
    protected $primaryKey = 'idLocalidad';

    protected $fillable = [
        'descripcion',
        'fk_idPartido',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function partido()
    {
        return $this->belongsTo('App\Partido', 'fk_idPartido');
    }
    public function barrios()
    {
        return $this->hasMany('App\Barrio', 'fk_idLocalidad','idLocalidad');
    }
}
