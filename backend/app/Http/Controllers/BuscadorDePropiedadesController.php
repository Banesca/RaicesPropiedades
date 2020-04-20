<?php

namespace App\Http\Controllers;

use App\Propiedad;
use App\Region;
use App\resultadoUnico;
use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller {
    public function buscarGeneral(Request $request) {
        $idTipoOperaion       = @$request->idTipoOperaion;
        $idTipoPropiedad      = @$request->idTipoPropiedad;
        $idMonedas            = @$request->idMonedas;
        $idProvincia          = @$request->idProvincia;
        $idPartido            = @$request->idPartido;
        $idLocalidad          = @$request->idLocalidad;
        $idBarrio             = @$request->idBarrio;
        $idCalle              = @$request->idCalle;
        $CantidadPersonal     = @$request->habitantes;
        $CantidadHabitaciones = @$request->CantidadHabitaciones;
        $Ambientes_Cochera    = @$request->Ambientes_Cochera;

        $montoMinimo = @$request->montoMinimo;
        $montoMaximo = @$request->montoMaximo;

        $minM2 = @$request->minM2;
        $maxM2 = @$request->maxM2;

        // return response()->json([
        //     'function'=>'buscarGeneral',
        //     'idTipoOperaion'=>$idTipoOperaion,
        //     'idTipoPropiedad'=>$idTipoPropiedad,
        //     'idMonedas'=>$idMonedas,
        //     'idProvincia'=>$idProvincia,
        //     'idPartido'=>$idPartido,
        //     'idLocalidad'=>$idLocalidad,
        //     'idBarrio'=>$idBarrio
        //     ]);

        $resultadoUnico = Propiedad::with(
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
            'Calle',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )
            ->where(function($query)
            use (
                $idTipoOperaion,
                $idTipoPropiedad,
                $idMonedas,
                $idProvincia,
                $idPartido,
                $idLocalidad,
                $idBarrio,
                $idCalle,
                $CantidadPersonal,
                $CantidadHabitaciones,
                $Ambientes_Cochera,
                $montoMinimo,
                $montoMaximo,
                $minM2,
                $maxM2
            ) {
                ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
                ! is_null($idTipoPropiedad) ? $query->where('fk_idTipoPropiedad', $idTipoPropiedad) : '';
                ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
                ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
                ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
                ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
                ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
                ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
                ! is_null($CantidadPersonal) ? $query->where('CantidadPersonal', $CantidadPersonal) : '';
                ! is_null($CantidadHabitaciones) ? $query->where('CantidadHabitaciones', $CantidadHabitaciones) : '';
                ! is_null($Ambientes_Cochera) ? $query->where('Ambientes_Cochera', $Ambientes_Cochera) : '';
                ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                    $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                    $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
                }) : '';
                ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                    $montoMinimo,
                    $montoMaximo,
                ]) : '';
            })
            ->where('fk_estado_publicacion', 1)
            ->get();

        $resultadoUnico->each(function($resultadoUnico) {
            $resultadoUnico->imagenes = [
                'imagen1'             => ! is_null(@$resultadoUnico->imagen1) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen1) : '',
                'imagen2'             => ! is_null(@$resultadoUnico->imagen2) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen2) : '',
                'imagen3'             => ! is_null(@$resultadoUnico->imagen3) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen3) : '',
                'imagen4'             => ! is_null(@$resultadoUnico->imagen4) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen4) : '',
                'imagen5'             => ! is_null(@$resultadoUnico->imagen5) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen5) : '',
                'imagen6'             => ! is_null(@$resultadoUnico->imagen6) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen6) : '',
                'imagen7'             => ! is_null(@$resultadoUnico->imagen7) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen7) : '',
                'imagen8'             => ! is_null(@$resultadoUnico->imagen8) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen8) : '',
                'imagen9'             => ! is_null(@$resultadoUnico->imagen9) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen9) : '',
                'imagen_para_galeria' => ! is_null(@$resultadoUnico->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen_para_galeria) : '',
            ];
        });

        return response()->json($this->getArbol($request, $resultadoUnico), 200);
    }

    //aplicar busqueda (Buscar por título ,descripción, tipo)
    public function propiedades_filte(Request $request) {
        $busqueda = "%".$request->search."%";

        $resultadoUnico = Propiedad::with(
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
            'Calle',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )
            ->where(function($query)
            use (
                $busqueda
            ) {
                $query->where('fk_idTipoOperaion', 'like', $busqueda);
                $query->where('fk_idTipoPropiedad', 'like', $busqueda);
                $query->where('titulo', 'like', $busqueda);
                $query->where('descipcion', 'like', $busqueda);
            })
            ->where('fk_estado_publicacion', 1)
            ->get();

        $resultadoUnico->each(function($resultadoUnico) {
            $resultadoUnico->imagenes = [
                'imagen1'             => ! is_null(@$resultadoUnico->imagen1) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen1) : '',
                'imagen2'             => ! is_null(@$resultadoUnico->imagen2) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen2) : '',
                'imagen3'             => ! is_null(@$resultadoUnico->imagen3) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen3) : '',
                'imagen4'             => ! is_null(@$resultadoUnico->imagen4) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen4) : '',
                'imagen5'             => ! is_null(@$resultadoUnico->imagen5) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen5) : '',
                'imagen6'             => ! is_null(@$resultadoUnico->imagen6) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen6) : '',
                'imagen7'             => ! is_null(@$resultadoUnico->imagen7) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen7) : '',
                'imagen8'             => ! is_null(@$resultadoUnico->imagen8) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen8) : '',
                'imagen9'             => ! is_null(@$resultadoUnico->imagen9) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen9) : '',
                'imagen_para_galeria' => ! is_null(@$resultadoUnico->imagen_para_galeria) ? asset('storage\\ficha2\\'.@$resultadoUnico->imagen_para_galeria) : '',
            ];
        });

        return response()->json([ 'propiedades' => $resultadoUnico ], 200);
    }

    public static function getArbol(Request $request, $ar) {
        $array = [];

        $idTipoOperaion  = @$request->idTipoOperaion;
        $idTipoPropiedad = @$request->idTipoPropiedad;
        $idMonedas       = @$request->idMonedas;
        $idProvincia     = @$request->idProvincia;
        $idPartido       = @$request->idPartido;
        $idLocalidad     = @$request->idLocalidad;
        $idBarrio        = @$request->idBarrio;
        $idCalle         = @$request->idCalle;
        $montoMinimo     = @$request->montoMinimo;
        $montoMaximo     = @$request->montoMaximo;
        $minM2           = @$request->minM2;
        $maxM2           = @$request->maxM2;

        $array['TipoOperaion']  = Propiedad::with('tipoOpeacion')->select('fk_idTipoOperaion')->where(function($query)
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoPropiedad'] = Propiedad::with('TipoPropiedad')->select('fk_idTipoPropiedad')->where(function($query
        )
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoMonedas']   = Propiedad::with('tipoMoneda')->select('fk_idMonedas')->where(function($query)
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoProvincia'] = Propiedad::with('Provincia')->select('fk_Direccion_Provincia_Id')->where(function(
            $query
        )
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoPartido']   = Propiedad::with('Partido')->select('fk_Direccion_Partido_Id')->where(function($query)
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoLocalidad'] = Propiedad::with('Localidad')->select('fk_Direccion_Localidad_Id')->where(function(
            $query
        )
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $array['TipoBarrio']    = Propiedad::with('Barrio')->select('fk_Direccion_Barrio_Id')->where(function($query)
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();

        $array['TipoCalle']    = Propiedad::with('Calle')->select('fk_Direccion_Calle_Id')->where(function($query)
        use (
            $idTipoOperaion,
            $idTipoPropiedad,
            $idMonedas,
            $idProvincia,
            $idPartido,
            $idLocalidad,
            $idBarrio,
            $idCalle,
            $montoMaximo,
            $montoMinimo,
            $minM2,
            $maxM2
        ) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            ! is_null($idCalle) ? $query->where('fk_Direccion_Calle_Id', $idCalle) : '';
            ! is_null($montoMinimo) && ! is_null($montoMaximo) ? $query->whereBetween('precio', [
                $montoMinimo,
                $montoMaximo,
            ]) : '';
            ! is_null($minM2) && ! is_null($maxM2) ? $query->where(function($query) use ($minM2, $maxM2) {
                $query->orwhereBetween('SuperficieConstruible', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieCubiertaCasa', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDeposito', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieDescubierta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieLocal', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieOficina', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlanta', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficiePlaya', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTerreno', [ $minM2, $maxM2 ]);
                $query->orwhereBetween('SuperficieTotal', [ $minM2, $maxM2 ]);
            }) : '';
        })->distinct()
            ->get();
        $response               = [ 'propiedades' => $ar, 'arbol' => $array ];

        return $response;
    }

    public function direcciones() {
        $E = Region::with('partidos.localidades.barrios')->get();

        return response()->json($E, 200);
    }
}
