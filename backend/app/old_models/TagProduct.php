<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TagProduct extends Model
{
    //
    protected $table      = 'tb_tag_producto';
    protected $primaryKey = 'idTagProduct';

    protected $fillable = [
        'codeProdSys',
        'tag',
        'fk_idSatate'
    ];
}
