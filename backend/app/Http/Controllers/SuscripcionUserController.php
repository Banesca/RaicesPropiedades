<?php

namespace App\Http\Controllers;

use App\Mail\MailsMasivos;
use App\Mail\SuscripcionMail;
use App\Mail_;
use App\Suscripcion;
use App\SuscripcionUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class SuscripcionUserController extends Controller {
    public function add(Request $request) {
        //dd($request->all());
        $this->validate($request, [
            'titulo'      => 'required',
            'descripcion' => 'required',
        ], [
            'titulo.required'      => 'El título es requerido',
            'descripcion.required' => 'La descripción es requerida',
        ]);

        DB::beginTransaction();

        try {

            $sus = new SuscripcionUser($request->all());

            $sus->save();

            $TodosCorreos = Suscripcion::where('fk_idStatusSistema', 1)->get();
            $cc           = Mail_::all();

            foreach ($TodosCorreos as $correo) {
                Mail::to($correo->email)->send(new MailsMasivos($sus, $correo->email, $correo->tocken));
            }

            /*Copia a Emails de Recepción*/
            foreach ($cc as $correo) {
                Mail::to($correo->email)->send(new MailsMasivos($sus, $correo->email, false));
            }


            $response = [
                'msj'             => 'Mails enviados Satisfactoriamente',
                'SuscripcionUser' => [
                    'id'          => $sus->idSuscripcionUser,
                    'titulo'      => $sus->titulo,
                    'descripcion' => $sus->descripcion,
                ],
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en SuscripcionController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function listar() {
        $sus = SuscripcionUser::all();

        $response = [
            'msj'         => 'Lista de Mensajes',
            'suscripcion' => $sus,
        ];

        return response()->json($response, 200);
    }

    public function editar(Request $request, $idSuscripcionUser = null) {
        $this->validate($request, [
            'titulo'      => 'required',
            'descripcion' => 'required',
        ], [
            'titulo.required'      => 'El título es requerido',
            'descripcion.required' => 'La descripción es requerida',
        ]);
        if (is_null($idSuscripcionUser)) {
            $response = [
                'msj' => 'Debe enviar el id de la suscripción',
            ];

            return response()->json($response, 404);
        }

        $sus = SuscripcionUser::find($idSuscripcionUser);
        $sus->fill($request->all());
        $sus->save();

        $response = [
            'msj' => 'Suscripción actualizada correctamente',
        ];

        return response()->json($response, 200);

    }

    public function destroy($idSuscripcionUser) {

        DB::beginTransaction();

        try {
            $sus = SuscripcionUser::find($idSuscripcionUser);

            if (is_null($sus)) {

                $response = [
                    'msj' => 'Suscripcón no existe',
                ];

                return response()->json($response, 401);
            }

            $sus->delete();
            $response = [
                'msj' => 'Suscripcón eliminada correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en SuscripcónController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }
}
