<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partidos extends Model
{
    protected $table      = 'tb_partidos';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'fk_provincia'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function region()
    {
        return $this->belongsTo('App\Regiones', 'fk_region');
    }
    public function localidades()
    {
        return $this->hasMany('App\Localidad', 'fk_partido','id');
    }
}
