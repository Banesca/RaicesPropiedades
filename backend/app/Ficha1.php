<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ficha1 extends Model {
    use SoftDeletes;
    protected $table      = 'tb_ficha1';
    protected $primaryKey = 'idFicha1';

    protected $fillable = [
        'descipcion',
        'fk_tipoPropiedad',
        'esUnaPropiedad',
        'esUnaNovedad',
        'esUnaOportunidad',
        'apareceEnGaleriaInicia',
        'fk_estado_publicacion',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function estadoPublicacion() {
        return $this->belongsTo('App\EstadoPublicacion', 'fk_estado_publicacion');
    }

    public function tipoPropiedad() {
        return $this->belongsTo('App\TipoPropiedad', 'fk_tipoPropiedad');
    }

}
