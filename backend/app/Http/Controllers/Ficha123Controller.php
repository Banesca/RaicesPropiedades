<?php

namespace App\Http\Controllers;

use App\Ficha123;
use App\Ficha3;
use App\Propiedad;
use Illuminate\Http\Request;

class Ficha123Controller extends Controller {
    public function listar($idFichas) {
        $ficha123 = Propiedad::with(
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
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda')->find($idFichas);

        return response()->json($ficha123);
    }
    public function listarTodo() {
        $ficha123 = Propiedad::with(
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
                    'TipoVista',
                    'estadoPublicacion',
                    'tipoOpeacion',
                    'tipoMoneda'
           )->get();

        return response()->json($ficha123);
    }
}
