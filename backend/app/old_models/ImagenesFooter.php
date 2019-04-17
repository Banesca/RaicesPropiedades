<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImagenesFooter extends Model {
    protected $table = 'tb_imagenes_footers';

    protected $primaryKey = 'idImagenFooter';

    protected $fillable = [
        'imagen',
        'orden',
        'fk_idConfigFooter',
    ];
    protected $dates = [ 'created_at', 'deleted_at' ];

}
