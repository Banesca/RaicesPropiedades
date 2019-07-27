<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $table      = 'tb_partidos';
    protected $primaryKey = 'idPartido';

    protected $fillable = [
        'descripcion',
        'fk_idRegion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function region()
    {
        return $this->belongsTo('App\Region', 'fk_idRegion');
    }
    public function localidades()
    {
        return $this->hasMany('App\Localidad', 'fk_idPartido','idPartido');
    }
}
