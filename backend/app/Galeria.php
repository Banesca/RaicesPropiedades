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


    public function imagenes()
    {
        return $this->hasMany('App\ImagenGaleria', 'fk_idGaleria','idGaleria');
    }

}