<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{

    protected $table      = 'tb_galeria';
    protected $primaryKey = 'idGaleria';

    protected $fillable = [
        'titulo',
        'descripcion',
        'fk_publicaciones',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // public function tipoPropiedad()
    // {
    //     return $this->belongsTo('App\TipoPropiedad', 'fk_tipoPropiedad');
    // }

}