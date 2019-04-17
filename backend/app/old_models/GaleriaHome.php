<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GaleriaHome extends Model
{
    use SoftDeletes;
    protected $table = 'tb_galeria_home';
    protected $primaryKey = 'idGaleriaHome';

    protected $fillable = [
        'titulo'
    ];
}
