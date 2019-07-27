<?php

namespace App\Http\Controllers;

use App\Barrio;
use App\Region;
use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller {

    public function buscarGeneral(Request $request) {

        $idTipoOperaion  = $request->idTipoOperaion;
        $idTipoPropiedad = $request->idTipoPropiedad;
        $idMonedas       = $request->idMonedas;

    }

    public function direcciones(){
        $E=Region::with('partidos.localidades.barrios')->get();

        return response()->json($E, 200);
    }
}
