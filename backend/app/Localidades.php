<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    protected $table      = 'tb_localidades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'fk_region'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function partido()
    {
        return $this->belongsTo('App\Partidos', 'fk_partido');
    }
    public function barrios()
    {
        return $this->hasMany('App\Barrios', 'fk_barrio','id');
    }
}
