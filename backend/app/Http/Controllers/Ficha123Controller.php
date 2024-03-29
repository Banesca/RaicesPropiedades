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
            ->wherein('fk_estado_publicacion', [ 1 ])
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
                'imagen8'             => ! is_null(@$ficha123->imagen8) ? asset('storage\\ficha2\\'.@$ficha123->imagen8) : '',
                'imagen9'             => ! is_null(@$ficha123->imagen9) ? asset('storage\\ficha2\\'.@$ficha123->imagen9) : '',
                'imagen10'             => ! is_null(@$ficha123->imagen10) ? asset('storage\\ficha2\\'.@$ficha123->imagen10) : '',
                'imagen11'             => ! is_null(@$ficha123->imagen11) ? asset('storage\\ficha2\\'.@$ficha123->imagen11) : '',
                'imagen12'             => ! is_null(@$ficha123->imagen12) ? asset('storage\\ficha2\\'.@$ficha123->imagen12) : '',
                'imagen13'             => ! is_null(@$ficha123->imagen13) ? asset('storage\\ficha2\\'.@$ficha123->imagen13) : '',
                'imagen14'             => ! is_null(@$ficha123->imagen14) ? asset('storage\\ficha2\\'.@$ficha123->imagen14) : '',
                'imagen15'             => ! is_null(@$ficha123->imagen15) ? asset('storage\\ficha2\\'.@$ficha123->imagen15) : '',
                'imagen16'             => ! is_null(@$ficha123->imagen16) ? asset('storage\\ficha2\\'.@$ficha123->imagen16) : '',
                'imagen17'             => ! is_null(@$ficha123->imagen17) ? asset('storage\\ficha2\\'.@$ficha123->imagen17) : '',
                'imagen18'             => ! is_null(@$ficha123->imagen18) ? asset('storage\\ficha2\\'.@$ficha123->imagen18) : '',
                'imagen19'             => ! is_null(@$ficha123->imagen19) ? asset('storage\\ficha2\\'.@$ficha123->imagen19) : '',
                'imagen20'             => ! is_null(@$ficha123->imagen20) ? asset('storage\\ficha2\\'.@$ficha123->imagen20) : '',
                'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
            ];

            //$ficha123->UrlArgen=@SincroniceArgenController::buscarURLdePropiedadArgen($ficha123->idPropiedad);
            return response()->json($ficha123);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }


    }

    public function listarTodas(Request $request, $idFichas) {
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
            ->wherein('fk_estado_publicacion', [ 1, 2, 3 ])
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
                'imagen8'             => ! is_null(@$ficha123->imagen8) ? asset('storage\\ficha2\\'.@$ficha123->imagen8) : '',
                'imagen9'             => ! is_null(@$ficha123->imagen9) ? asset('storage\\ficha2\\'.@$ficha123->imagen9) : '',
                'imagen10'             => ! is_null(@$ficha123->imagen10) ? asset('storage\\ficha2\\'.@$ficha123->imagen10) : '',
                'imagen11'             => ! is_null(@$ficha123->imagen11) ? asset('storage\\ficha2\\'.@$ficha123->imagen11) : '',
                'imagen12'             => ! is_null(@$ficha123->imagen12) ? asset('storage\\ficha2\\'.@$ficha123->imagen12) : '',
                'imagen13'             => ! is_null(@$ficha123->imagen13) ? asset('storage\\ficha2\\'.@$ficha123->imagen13) : '',
                'imagen14'             => ! is_null(@$ficha123->imagen14) ? asset('storage\\ficha2\\'.@$ficha123->imagen14) : '',
                'imagen15'             => ! is_null(@$ficha123->imagen15) ? asset('storage\\ficha2\\'.@$ficha123->imagen15) : '',
                'imagen16'             => ! is_null(@$ficha123->imagen16) ? asset('storage\\ficha2\\'.@$ficha123->imagen16) : '',
                'imagen17'             => ! is_null(@$ficha123->imagen17) ? asset('storage\\ficha2\\'.@$ficha123->imagen17) : '',
                'imagen18'             => ! is_null(@$ficha123->imagen18) ? asset('storage\\ficha2\\'.@$ficha123->imagen18) : '',
                'imagen19'             => ! is_null(@$ficha123->imagen19) ? asset('storage\\ficha2\\'.@$ficha123->imagen19) : '',
                'imagen20'             => ! is_null(@$ficha123->imagen20) ? asset('storage\\ficha2\\'.@$ficha123->imagen20) : '',

                'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
            ];

            //$ficha123->UrlArgen=@SincroniceArgenController::buscarURLdePropiedadArgen($ficha123->idPropiedad);
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
            ->wherein('fk_estado_publicacion', [ 1 ])
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
                    'imagen8'             => ! is_null(@$ficha123->imagen8) ? asset('storage\\ficha2\\'.@$ficha123->imagen8) : '',
                    'imagen9'             => ! is_null(@$ficha123->imagen9) ? asset('storage\\ficha2\\'.@$ficha123->imagen9) : '',
                    'imagen10'             => ! is_null(@$ficha123->imagen10) ? asset('storage\\ficha2\\'.@$ficha123->imagen10) : '',
                    'imagen11'             => ! is_null(@$ficha123->imagen11) ? asset('storage\\ficha2\\'.@$ficha123->imagen11) : '',
                    'imagen12'             => ! is_null(@$ficha123->imagen12) ? asset('storage\\ficha2\\'.@$ficha123->imagen12) : '',
                    'imagen13'             => ! is_null(@$ficha123->imagen13) ? asset('storage\\ficha2\\'.@$ficha123->imagen13) : '',
                    'imagen14'             => ! is_null(@$ficha123->imagen14) ? asset('storage\\ficha2\\'.@$ficha123->imagen14) : '',
                    'imagen15'             => ! is_null(@$ficha123->imagen15) ? asset('storage\\ficha2\\'.@$ficha123->imagen15) : '',
                    'imagen16'             => ! is_null(@$ficha123->imagen16) ? asset('storage\\ficha2\\'.@$ficha123->imagen16) : '',
                    'imagen17'             => ! is_null(@$ficha123->imagen17) ? asset('storage\\ficha2\\'.@$ficha123->imagen17) : '',
                    'imagen18'             => ! is_null(@$ficha123->imagen18) ? asset('storage\\ficha2\\'.@$ficha123->imagen18) : '',
                    'imagen19'             => ! is_null(@$ficha123->imagen19) ? asset('storage\\ficha2\\'.@$ficha123->imagen19) : '',
                    'imagen20'             => ! is_null(@$ficha123->imagen20) ? asset('storage\\ficha2\\'.@$ficha123->imagen20) : '',

                    'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
                ];
                //$ficha123->UrlArgen=@SincroniceArgenController::buscarURLdePropiedadArgen($ficha123->idPropiedad);
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
            ->orderby('idPropiedad', 'desc')
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
                    'imagen8'             => ! is_null(@$ficha123->imagen8) ? asset('storage\\ficha2\\'.@$ficha123->imagen8) : '',
                    'imagen9'             => ! is_null(@$ficha123->imagen9) ? asset('storage\\ficha2\\'.@$ficha123->imagen9) : '',
                    'imagen10'             => ! is_null(@$ficha123->imagen10) ? asset('storage\\ficha2\\'.@$ficha123->imagen10) : '',
                    'imagen11'             => ! is_null(@$ficha123->imagen11) ? asset('storage\\ficha2\\'.@$ficha123->imagen11) : '',
                    'imagen12'             => ! is_null(@$ficha123->imagen12) ? asset('storage\\ficha2\\'.@$ficha123->imagen12) : '',
                    'imagen13'             => ! is_null(@$ficha123->imagen13) ? asset('storage\\ficha2\\'.@$ficha123->imagen13) : '',
                    'imagen14'             => ! is_null(@$ficha123->imagen14) ? asset('storage\\ficha2\\'.@$ficha123->imagen14) : '',
                    'imagen15'             => ! is_null(@$ficha123->imagen15) ? asset('storage\\ficha2\\'.@$ficha123->imagen15) : '',
                    'imagen16'             => ! is_null(@$ficha123->imagen16) ? asset('storage\\ficha2\\'.@$ficha123->imagen16) : '',
                    'imagen17'             => ! is_null(@$ficha123->imagen17) ? asset('storage\\ficha2\\'.@$ficha123->imagen17) : '',
                    'imagen18'             => ! is_null(@$ficha123->imagen18) ? asset('storage\\ficha2\\'.@$ficha123->imagen18) : '',
                    'imagen19'             => ! is_null(@$ficha123->imagen19) ? asset('storage\\ficha2\\'.@$ficha123->imagen19) : '',
                    'imagen20'             => ! is_null(@$ficha123->imagen20) ? asset('storage\\ficha2\\'.@$ficha123->imagen20) : '',

                    'imagen_para_galeria' => ! is_null(@$ficha123->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$ficha123->imagen_para_galeria) : '',
                ];
                // $ficha123->UrlArgen=@SincroniceArgenController::buscarURLdePropiedadArgen($ficha123->idPropiedad);
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
