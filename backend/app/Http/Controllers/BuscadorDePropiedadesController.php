<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Ficha123;
use App\Propiedad;
use App\Region;
use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller {

    public function buscarGeneral(Request $request) {


        $idTipoOperaion  = @$request->idTipoOperaion;
        $idTipoPropiedad = @$request->idTipoPropiedad;
        $idMonedas       = @$request->idMonedas;
        $idProvincia = @$request->idProvincia;
        $idPartido   = @$request->idPartido;
        $idLocalidad = @$request->idLocalidad;
        $idBarrio    = @$request->idBarrio;

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

        return response()->json($resultadoUnico, 200);
    }

    public function direcciones() {
        $E = Region::with('partidos.localidades.barrios')->get();
        return response()->json($E, 200);
    }
}
