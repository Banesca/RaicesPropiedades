<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ficha123 extends Model
{
    use SoftDeletes;
    protected $table      = 'ficha123s';
    protected $primaryKey = 'idFichas';

    protected $fillable = [
        'fk_idFicha1',
        'fk_idFicha2',
        'fk_idFicha3',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function ficha1() {
        return $this->belongsTo('App\Ficha1', 'fk_idFicha1')->with('estadoPublicacion','tipoPropiedad');
    }
    public function ficha2() {
        return $this->belongsTo('App\Ficha2', 'fk_idFicha2');
    }
    public function ficha3() {
        return $this->belongsTo('App\Propiedad', 'fk_idFicha3')->with(
            'TipoPropiedad',
            'Disposicion',
            'Estado',
            'Orientacion',
            'TipoAcceso',
            'TipoAscensor',
            'TipoBalcon',
            'TipoBano',
            'TipoCalefaccion',
            'TipoCampo',
            'TipoCobertura',
            'TipoCoche',
            'TipoCochera',
            'TipoCosta',
            'TipoEdificio',
            'TipoExpensas',
            'TipoFondoComercio',
            'TipoFrente',
            'TipoHotel',
            'TipoLocal',
            'TipoPendiente',
            'TipoPiso',
            'TipoPorton',
            'TipoTecho',
            'TipoTechoIndustrial',
            'TipoTerreno',
            'TipoUnidad',
            'TipoVista'
        );
    }


}
