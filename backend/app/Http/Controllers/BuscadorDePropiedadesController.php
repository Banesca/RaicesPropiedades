<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\resultadoUnico;
use App\Propiedad;
use App\Region;
use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller {

    public function buscarGeneral(Request $request) {

        $idTipoOperaion  = @$request->idTipoOperaion;
        $idTipoPropiedad = @$request->idTipoPropiedad;
        $idMonedas       = @$request->idMonedas;
        $idProvincia     = @$request->idProvincia;
        $idPartido       = @$request->idPartido;
        $idLocalidad     = @$request->idLocalidad;
        $idBarrio        = @$request->idBarrio;

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
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )
            ->where(function($query)
            use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
                ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
                ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
                ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
                ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
                ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
                ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
                ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            })
            ->get();

        $resultadoUnico->each(function ($resultadoUnico) {
            $resultadoUnico->imagenes = [
                'imagen1'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen1),
                'imagen2'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen2),
                'imagen3'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen3),
                'imagen4'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen4),
                'imagen5'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen5),
                'imagen6'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen6),
                'imagen7'             => asset('storage\\ficha2\\' . @$resultadoUnico->imagen7),
                'imagen_para_galeria' => asset('storage\\ficha2\\' . @$resultadoUnico->imagen_para_galeria),
            ];
        });

        return response()->json($this->getArbol($request, $resultadoUnico), 200);
    }


    public static function getArbol(Request $request,$ar) {
        $array = [];

        $idTipoOperaion  = @$request->idTipoOperaion;
        $idTipoPropiedad = @$request->idTipoPropiedad;
        $idMonedas       = @$request->idMonedas;
        $idProvincia     = @$request->idProvincia;
        $idPartido       = @$request->idPartido;
        $idLocalidad     = @$request->idLocalidad;
        $idBarrio        = @$request->idBarrio;


        $array['TipoOperaion']  = Propiedad::with('tipoOpeacion')->select('fk_idTipoOperaion')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();
        $array['TipoPropiedad'] = Propiedad::with('TipoPropiedad')->select('fk_idTipoPropiedad')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();
        $array['TipoMonedas']   = Propiedad::with('tipoMoneda')->select('fk_idMonedas')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();
        $array['TipoProvincia'] = Propiedad::with('Provincia')->select('fk_Direccion_Provincia_Id')->where(function($query)
            use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
                ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
                ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
                ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
                ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
                ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
                ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
                ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
            })->distinct()
                ->get();
        $array['TipoPartido']   = Propiedad::with('Partido')->select('fk_Direccion_Partido_Id')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();
        $array['TipoLocalidad'] = Propiedad::with('Localidad')->select('fk_Direccion_Localidad_Id')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();
        $array['TipoBarrio']    = Propiedad::with('Barrio')->select('fk_Direccion_Barrio_Id')->where(function($query)
        use ($idTipoOperaion, $idTipoPropiedad, $idMonedas, $idProvincia, $idPartido, $idLocalidad, $idBarrio) {
            ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
            ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
            ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
            ! is_null($idProvincia) ? $query->where('fk_Direccion_Provincia_Id', $idProvincia) : '';
            ! is_null($idPartido) ? $query->where('fk_Direccion_Partido_Id', $idPartido) : '';
            ! is_null($idLocalidad) ? $query->where('fk_Direccion_Localidad_Id', $idLocalidad) : '';
            ! is_null($idBarrio) ? $query->where('fk_Direccion_Barrio_Id', $idBarrio) : '';
        })->distinct()
            ->get();

        $ar['arbol']=$array;
        return $ar;


    }

    public function direcciones() {
        $E = Region::with('partidos.localidades.barrios')->get();

        return response()->json($E, 200);
    }
}
