<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Disposicion extends Model
{
    protected $table = 'tb_disposiciones';
    protected $primaryKey = 'idDisposicion';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

}
