<?php

namespace App\Http\Controllers;

use App\Contacto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactoController extends Controller
{
    public function add(Request $request){
        $this->validate($request, [
            'email' => 'required|email|unique:tb_mails,email,'.$request->id.',idMail,deleted_at,NULL',
        ], [
            'email.unique'   => 'Este Email ya se encuentra en uso',
            'email.email'    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required' => 'El Email es requerido',
        ]);

        $mailN = new Contacto($request->all());
        $mailN->save();

        $response = [
            'msj'   => 'Mail creado exitosamente',
            'mails' => Mail::all(),
        ];

        return response()->json($response, 201);

    }
}
