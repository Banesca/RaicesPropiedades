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

            $ficha123->imagenes   = [
                'imagen1'             => asset('storage\\ficha2\\'.@$ficha123->imagen1),
                'imagen2'             => asset('storage\\ficha2\\'.@$ficha123->imagen2),
                'imagen3'             => asset('storage\\ficha2\\'.@$ficha123->imagen3),
                'imagen4'             => asset('storage\\ficha2\\'.@$ficha123->imagen4),
                'imagen5'             => asset('storage\\ficha2\\'.@$ficha123->imagen5),
                'imagen6'             => asset('storage\\ficha2\\'.@$ficha123->imagen6),
                'imagen7'             => asset('storage\\ficha2\\'.@$ficha123->imagen7),
                'imagen_para_galeria' => asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria),
            ];



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
        $ficha123->each(function($ficha123) {
            $ficha123->imagenes   = [
                'imagen1'             => asset('storage\\ficha2\\'.@$ficha123->imagen1),
                'imagen2'             => asset('storage\\ficha2\\'.@$ficha123->imagen2),
                'imagen3'             => asset('storage\\ficha2\\'.@$ficha123->imagen3),
                'imagen4'             => asset('storage\\ficha2\\'.@$ficha123->imagen4),
                'imagen5'             => asset('storage\\ficha2\\'.@$ficha123->imagen5),
                'imagen6'             => asset('storage\\ficha2\\'.@$ficha123->imagen6),
                'imagen7'             => asset('storage\\ficha2\\'.@$ficha123->imagen7),
                'imagen_para_galeria' => asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria),
            ];

        });



        return response()->json($ficha123);
    }
}
