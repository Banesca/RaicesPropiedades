<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDescuento;

class TipoDescuentoController extends Controller
{
    public function index(){
    	$t = TipoDescuento::get();

    	if(is_null($t)){
    		return response()->json(['msj' => 'No hay tipo descuentos disponibles'],201);
    	}else{
    		return response()->json(['tipo_descuento' => $t],201);
    	}
    }
}
