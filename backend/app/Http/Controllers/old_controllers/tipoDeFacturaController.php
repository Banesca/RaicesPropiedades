<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoDeFactura;

class tipoDeFacturaController extends Controller
{
    public function getTipoFacturas(){
    	$f = TipoDeFactura::get();
    	if(is_null($f)){
    		return response()->json(['messege' => 'no hay facturas disponibles'], 401);
    	}else{
    		return response()->json([
    			'msj' => 'Tipos de Facturas',
    			'tipo_facturas' => $f
    		], 200);
    	}
    }
}
