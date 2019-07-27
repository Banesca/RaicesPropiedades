<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactoController extends Controller {
    public function add(Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|unique:tb_mails,email,'.$request->id.',idMail,deleted_at,NULL',
            'nombre'   => 'required',
            'telefono' => 'required',
            'mensaje'  => 'required',
        ], [
            'email.unique'      => 'Este Email ya se encuentra en uso',
            'email.email'       => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required'    => 'El Email es requerido',
            'nombre.required'   => 'El nombre es requerido',
            'telefono.required' => 'El teléfono es requerido',
            'mensaje.required'  => 'El mensaje es requerido',
        ]);

        $contac = new Contacto($request->all());
        $contac->save();

        $response = [
            'msj'      => 'Contacto creado exitosamente',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);

    }
    public function listar(){
        $contac=Contacto::get();
        $response = [
            'msj'      => 'Lista',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);
    }
}
