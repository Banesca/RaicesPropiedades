<?php

namespace App\Http\Controllers;

use App\Ficha123;
use Illuminate\Http\Request;

class Ficha123Controller extends Controller {
    public function listar($idFichas) {
        $ficha123 = Ficha123::with('ficha1', 'ficha2', 'ficha3')->find($idFichas);

        return response()->json($ficha123);
    }
}
