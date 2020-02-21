<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FichaPropiedad extends Model
{
    protected $table      = 'tb_fichas_propiedad';
    protected $primaryKey = 'idFichas';
    use SoftDeletes;

    protected $fillable = [
        'titulo',
        'ubicacion',
        'caracteristica',
        'valor',
        'comision',
        'img1fa',
        'img2pr',
        'img3pl',
        'img4pl',
        'img5sa',
        'img6sa',
        'fk_idPropiedad'
    ];

    protected $hidden   = [
        'created_at',
        'updated_at',
        'deleted_at'
    ];
}
