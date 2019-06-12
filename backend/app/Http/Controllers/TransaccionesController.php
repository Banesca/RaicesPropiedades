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

    /*Creado por Breiddy Monterrey*/
    public function store(Request $request) {
       
        $this->validate($request, [
            'nombre_apellido'      => 'required|min:2',
            'telefono'      => 'required|min:2',
            'fk_tipoPropiedad'      => 'required|min:1',
            'titulo'      => 'required|min:2',
            'descripcion'      => 'required|min:2',
         
        ], [
            'nombre_apellido.required'        => 'El nombre es requerido',
            'nombre_apellido.min'             => 'El Nombre no puede tener menos de 2 caracteres',
            'telefono.required'               => 'El número teléfono es requerido',
            'telefono.min'                    => 'El número de teléfono no puede tener menos de 2 caracteres',
            'fk_tipoPropiedad.required'       => 'La categoría es requerida',
            'fk_tipoPropiedad.min'            => 'La categoría no puede tener menos de 2 caracteres',
            'titulo.required'                 => 'El título es requerido',
            'titulo.min'                      => 'El título no puede tener menos de 2 caracteres',
            'descripcion.required'            => 'La descripción es requerida',
            'descripcion.min'                 => 'El título no puede tener menos de 2 caracteres',
           
        ]);

        try {

            $transaccion = new Transacciones($request->all());
         
            $transaccion->save();
          
            DB::commit();
            $response = [
                'msj'  => 'Transacción Creada Exitosamente',
                'user' => $transaccion,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en TransaccionesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }




        
    
        
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
