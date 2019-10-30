<?php

namespace App\Http\Controllers;

use App\Propiedad;

use Illuminate\Http\Request;

class Ficha123Controller extends Controller {
    public function listar(Request $request, $idFichas) {
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
            'TipoUnidadCasa',
            'TipoUnidadDepartamento',
            'Barrio',
            'Localidad',
            'Pais',
            'Partido',
            'Provincia',
            'SubBarrio',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda')
            ->wherein('fk_estado_publicacion', [ 1, 2 ])
            ->find($idFichas);
        if (! is_null($ficha123)) {
            $ficha123->imagenes = [
                'imagen1'             => ! is_null(@$ficha123->imagen1) ? asset('storage\\ficha2\\'.@$ficha123->imagen1) : '',
                'imagen2'             => ! is_null(@$ficha123->imagen2) ? asset('storage\\ficha2\\'.@$ficha123->imagen2) : '',
                'imagen3'             => ! is_null(@$ficha123->imagen3) ? asset('storage\\ficha2\\'.@$ficha123->imagen3) : '',
                'imagen4'             => ! is_null(@$ficha123->imagen4) ? asset('storage\\ficha2\\'.@$ficha123->imagen4) : '',
                'imagen5'             => ! is_null(@$ficha123->imagen5) ? asset('storage\\ficha2\\'.@$ficha123->imagen5) : '',
                'imagen6'             => ! is_null(@$ficha123->imagen6) ? asset('storage\\ficha2\\'.@$ficha123->imagen6) : '',
                'imagen7'             => ! is_null(@$ficha123->imagen7) ? asset('storage\\ficha2\\'.@$ficha123->imagen7) : '',
                'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
            ];

            return response()->json($ficha123);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }


    }

    public function listarTodo(Request $request) // Uso request para pasarlo al arbol, aunq no tenga nada
    {

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
            'TipoUnidadCasa',
            'TipoUnidadDepartamento',
            'Barrio',
            'Localidad',
            'Pais',
            'Partido',
            'Provincia',
            'SubBarrio',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )
            ->wherein('fk_estado_publicacion', [ 1, 2 ])
            ->get();

        if (! is_null($ficha123)) {

            $ficha123->each(function($ficha123) {
                $ficha123->imagenes = [
                    'imagen1'             => ! is_null(@$ficha123->imagen1) ? asset('storage\\ficha2\\'.@$ficha123->imagen1) : '',
                    'imagen2'             => ! is_null(@$ficha123->imagen2) ? asset('storage\\ficha2\\'.@$ficha123->imagen2) : '',
                    'imagen3'             => ! is_null(@$ficha123->imagen3) ? asset('storage\\ficha2\\'.@$ficha123->imagen3) : '',
                    'imagen4'             => ! is_null(@$ficha123->imagen4) ? asset('storage\\ficha2\\'.@$ficha123->imagen4) : '',
                    'imagen5'             => ! is_null(@$ficha123->imagen5) ? asset('storage\\ficha2\\'.@$ficha123->imagen5) : '',
                    'imagen6'             => ! is_null(@$ficha123->imagen6) ? asset('storage\\ficha2\\'.@$ficha123->imagen6) : '',
                    'imagen7'             => ! is_null(@$ficha123->imagen7) ? asset('storage\\ficha2\\'.@$ficha123->imagen7) : '',
                    'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
                ];
            });

            return response()->json($ficha123);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }

    }

    public function listarTodoSinFiltro(Request $request) // Uso request para pasarlo al arbol, aunq no tenga nada
    {
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
            'TipoUnidadCasa',
            'TipoUnidadDepartamento',
            'Barrio',
            'Localidad',
            'Pais',
            'Partido',
            'Provincia',
            'SubBarrio',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )
            ->get();

        if (! is_null($ficha123)) {

            $ficha123->each(function($ficha123) {
                $ficha123->imagenes = [
                    'imagen1'             => ! is_null(@$ficha123->imagen1) ? asset('storage\\ficha2\\'.@$ficha123->imagen1) : '',
                    'imagen2'             => ! is_null(@$ficha123->imagen2) ? asset('storage\\ficha2\\'.@$ficha123->imagen2) : '',
                    'imagen3'             => ! is_null(@$ficha123->imagen3) ? asset('storage\\ficha2\\'.@$ficha123->imagen3) : '',
                    'imagen4'             => ! is_null(@$ficha123->imagen4) ? asset('storage\\ficha2\\'.@$ficha123->imagen4) : '',
                    'imagen5'             => ! is_null(@$ficha123->imagen5) ? asset('storage\\ficha2\\'.@$ficha123->imagen5) : '',
                    'imagen6'             => ! is_null(@$ficha123->imagen6) ? asset('storage\\ficha2\\'.@$ficha123->imagen6) : '',
                    'imagen7'             => ! is_null(@$ficha123->imagen7) ? asset('storage\\ficha2\\'.@$ficha123->imagen7) : '',
                    'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
                ];
            });

            return response()->json($ficha123);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }

    }
}
