<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sucursal extends Model {
    use SoftDeletes;
    protected $table      = 'tb_sucursals';
    protected $primaryKey = 'idSucursal';

    protected $fillable = [
        'nombreSucursal',
        'telefonoSucursal',
        'emailSucursal',
        'direccionSucursal',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];


}
