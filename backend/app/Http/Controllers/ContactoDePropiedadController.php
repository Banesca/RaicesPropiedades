<?php

namespace App\Http\Controllers;

use App\ContactoDePropiedad;

use App\Mail\ContactoPropiedadMail;
use App\Mail_;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class ContactoDePropiedadController extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            'email'          => 'required|email|unique:tb_contacto_de_propiedads,email,'.$request->id.',idContactoPropiedad,deleted_at,NULL',
            'nombre'         => 'required',
            'telefono'       => 'required',
            'mensaje'        => 'required',
            'fk_idPropiedad' => 'required',
        ], [
            'email.unique'            => 'Este Email ya se encuentra en uso',
            'email.email'             => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required'          => 'El Email es requerido',
            'nombre.required'         => 'El nombre es requerido',
            'telefono.required'       => 'El teléfono es requerido',
            'mensaje.required'        => 'El mensaje es requerido',
            'fk_idPropiedad.required' => 'La Propiedad es requerida',
        ]);

        $contac = new ContactoDePropiedad($request->all());
        $contac->save();
        $contac->propiedad;

        Mail::to($contac->email)->send(new ContactoPropiedadMail($contac));

        /*Copia a Emails de Recepción*/
        //$cc = Mail_::all();
        //foreach ($cc as $correo) {
            //Mail::to($correo->email)->send(new ContactoPropiedadMail($contac));
        //}

        /*Registro a usuario como nuevo suscriptor*/

         /*$sus = Suscripcion::where('email', $request->email)->get();
         if (count($sus) == 0) {
             $s = new Suscripcion([ 'email' => $request->email ]);
             $s->generateToken();
             $s->save();
             Mail::to($request->email)->send(new SuscripcionMail($s));
         }*/

        $response = [
            'msj'      => 'Contacto De Propiedad creada exitosamente',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);

    }

    public function listar() {
        $contac   = ContactoDePropiedad::get();
        $response = [
            'msj'      => 'Lista',
            'contacto' => $contac,
        ];

        return response()->json($response, 200);
    }
}
