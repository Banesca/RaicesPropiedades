<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidades extends Model
{
    protected $table      = 'tb_localidades';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'nombre',
        'fk_region',
        'fk_idPartido'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function partido()
    {
        return $this->belongsTo('App\Partidos', 'fk_idPartido');
    }
   /* public function barrios()
    {
        return $this->hasMany('App\Barrios', 'fk_barrio','id');
    }*/
}
