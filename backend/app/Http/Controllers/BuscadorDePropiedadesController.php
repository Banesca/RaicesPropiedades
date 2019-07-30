<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Ficha123;
use App\Region;
use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller {

    public function buscarGeneral(Request $request) {

        $idTipoOperaion  = @$request->idTipoOperaion;
        $idTipoPropiedad = @$request->idTipoPropiedad;
        $idMonedas       = @$request->idMonedas;

        $resultadoUnico = Ficha123::with('ficha1','ficha2','ficha3')
            ->whereHas('ficha1', function($query) use ($idTipoOperaion,$idTipoPropiedad,$idMonedas) {
                   ! is_null($idTipoOperaion) ? $query->where('fk_idTipoOperaion', $idTipoOperaion) : '';
                   ! is_null($idTipoPropiedad) ? $query->where('fk_tipoPropiedad', $idTipoPropiedad) : '';
                   ! is_null($idMonedas) ? $query->where('fk_idMonedas', $idMonedas) : '';
               })
            
        ->get();

        return response()->json($resultadoUnico, 200);
    }

    public function direcciones() {
        $E = Region::with('partidos.localidades.barrios')->get();

        return response()->json($E, 200);
    }
}
