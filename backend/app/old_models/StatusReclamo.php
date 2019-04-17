<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StatusReclamo extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_status_reclamos';
    protected $primaryKey = 'idStatusReclamo';

    protected $fillable = [
        'descripcion',
    ];

    public function reclamo()
    {
        return $this->hasOne('App\ReclamosYSugerencia','fk_idStatusReclamo','idStatusReclamo');
    }

}
