<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
// use App\Mail\EnviarTokenMail;
// use App\Mail\Prueba;
// use App\Perfil;
// use App\PerfilCliente;
// use App\Suscripcion;
use App\Transacciones;
use App\TipoPropiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
// use Image;

class TransaccionesController extends Controller {

    public function transacciones() {

        $transaccion='Prueba api transacciones';
        $response = [
            'msj'   => 'Prueba',
            'data' => $transaccion,
        ];

        return response()->json($response, 200);

    }

    public function listaCategorias() {

        $categoria = TipoPropiedad::all();
        $response = [
            'msj'   => 'Categorias',
            'data' => $categoria,
        ];

        return response()->json($response, 200);

    }

}
