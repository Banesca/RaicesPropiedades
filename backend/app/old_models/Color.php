<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model {
    use SoftDeletes;
    protected $table      = 'tb_colores';
    protected $primaryKey = 'idColor';


    protected $fillable = [
        'colorOscuro',
        'colorMedio',
        'colorClaro',
    ];
}
