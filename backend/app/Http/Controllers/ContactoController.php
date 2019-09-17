<?php

namespace App\Http\Controllers;

use App\Contacto;
use App\Mail\ContactoMail;
use App\Mail\SuscripcionMail;
use App\Mail_;
use App\Suscripcion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactoController extends Controller {
    public function add(Request $request) {
        $this->validate($request, [
            'email'    => 'required|email|unique:tb_contactos,email,'.$request->id.',idContacto,deleted_at,NULL',
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

        /*Copia a Emails de Recepción*/
        $cc = Mail_::all();
        foreach ($cc as $correo) {
            Mail::to($correo->email)->send(new ContactoMail($contac));
        }

        /*Registro a usuario como nuevo suscriptor*/
        $sus = Suscripcion::where('email', $request->email)->get();
        if (count($sus) == 0) {
            $s = new Suscripcion([ 'email' => $request->email ]);
            $s->generateToken();
            $s->save();
            Mail::to($request->email)->send(new SuscripcionMail($s));
        }


        $response = [
            'msj'      => 'Contacto creado exitosamente',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);

    }

    public function listar() {
        $contac   = Contacto::get();
        $response = [
            'msj'      => 'Lista',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);
    }
}
