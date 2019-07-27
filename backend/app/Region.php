<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table      = 'tb_regions';
    protected $primaryKey = 'idRegion';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
    public function partidos()
    {
        return $this->hasMany('App\Partido', 'fk_idRegion','idRegion');
    }

}
