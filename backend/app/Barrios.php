<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barrios extends Model
{
    protected $table      = 'tb_barrios';
    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'fk_localidad'
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];

    public function localidad()
    {
        return $this->belongsTo('App\Localidades', 'fk_localidad');
    }
}
