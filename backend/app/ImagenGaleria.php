<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImagenGaleria extends Model
{
    use SoftDeletes;

    protected $table = 'fk_imagen_galerias';

    protected $primaryKey = 'idImagenesGaleria';

    protected $fillable = [
        'imagen',
        'fk_idGaleria',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function galeria()
    {
        return $this->belongsTo('App\Galeria', 'fk_idGaleria');
    }
}
