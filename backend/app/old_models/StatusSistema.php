<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusSistema extends Model {

    use SoftDeletes;
    protected $table      = 'tb_status_sistemas';
    protected $primaryKey = 'idStatusSistema';

    protected $fillable = [
        'descripcion',
    ];

}
