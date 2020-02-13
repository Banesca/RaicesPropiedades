<?php

namespace App\Http\Controllers;

use App\FichaPropiedad;
use Illuminate\Http\Request;

class FichaPropiedadController extends Controller
{

    public function add(Request $request)
    {
        $this->validate($request, [
            'titulo'            => 'required',
            'ubicacion'         => 'required',
            'caracteristica'    => 'required',
            'valor'             => 'required',
            'comision'          => 'required',
            'img1fa'            => 'required',
            'img2pr'            => 'required',
            'img3pl'            => 'required',
            'img4pl'            => 'required',
            'img5sa'            => 'required',
            'img6sa'            => 'required',
            'fk_idPropiedad'    => 'required'
        ], [
            'titulo'            => 'El Campo es requerido',
            'ubicacion'         => 'El Campo es requerido',
            'caracteristica'    => 'El Campo es requerido',
            'valor'             => 'El Campo es requerido',
            'comision'          => 'El Campo es requerido',
            'img1fa'            => 'El Campo es requerido',
            'img2pr'            => 'El Campo es requerido',
            'img3pl'            => 'El Campo es requerido',
            'img4pl'            => 'El Campo es requerido',
            'img5sa'            => 'El Campo es requerido',
            'img6sa'            => 'El Campo es requerido',
            'fk_idPropiedad'    => 'El Campo es requerido'
        ]);

    }
}
