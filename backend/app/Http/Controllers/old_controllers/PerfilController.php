<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Perfil;

class PerfilController extends Controller
{
    public function getPerfil(){
    	$p = Perfil::get();
    	return response()->json($p,200);
    }
}
