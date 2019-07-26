<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuscadorDePropiedadesController extends Controller
{
    public function buscarGeneral(Request $request){

        $idTipoOperaion=$request->idTipoOperaion;
        $idTipoPropiedad=$request->idTipoPropiedad;
        $idMonedas=$request->idMonedas;

    }
}
