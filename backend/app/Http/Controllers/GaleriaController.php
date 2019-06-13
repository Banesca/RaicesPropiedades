<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
use App\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
// use Image;

class GaleriaController extends Controller {

    /*Creado por Breiddy Monterrey*/
   
    public function listaGaleria() {

        $galeria = Galeria::all();
        $response = [
            'msj'   => 'Galerias',
            'data' => $galeria,
        ];

        return response()->json($response, 200);

    }

    public function listarGaleriaPorId($id){
        
        $galeria = Galeria::find($id);
        
        if($galeria==null){
            
            $response = [
                'message'        => 'No existe galeria',
            ];

          
        }else{
            $response = [
                'msj'        => 'Galeria',
                'suculsales' => $galeria,
            ];
        }
       
        return response()->json($response, 200);
    }

}
