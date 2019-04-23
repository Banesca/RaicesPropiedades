<?php

namespace App\Http\Controllers;

use App\Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class MailController extends Controller {

    public function addMail(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|unique:tb_mails,email,'.$request->id.',idMail,deleted_at,NULL',
        ], [
            'email.unique'   => 'Este Email ya se encuentra en uso',
            'email.email'    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required' => 'El Email es requerido',
        ]);

        $mailN = new Mail($request->all());
        $mailN->save();

        $response = [
            'msj'   => 'Mail creado exitosamente',
            'mails' => Mail::all(),
        ];

        return response()->json($response, 201);

    }

    public function update(Request $request, $idMail) {

        $this->validate($request, [
            'email' => 'required|email|unique:tb_mails,email,'.$idMail.',idMail,deleted_at,NULL',
        ], [
            'email.unique'   => 'Este Email ya se encuentra en uso',
            'email.email'    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required' => 'El Email es requerido',
        ]);

        DB::beginTransaction();

        try {
            $mail = Mail::findOrFail($idMail);
            $mail->fill($request->all());

            $mail->save();
            DB::commit();

            $response = [
                'Mails' => Mail::all(),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en MailController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idMail) {

        DB::beginTransaction();

        try {
            $mail = Mail::find($idMail);

            if (is_null($mail)) {

                $response = [
                    'msj' => 'Mail no existe',
                ];

                return response()->json($response, 401);
            }

            $mail->delete();
            $response = [
                'msj'  => 'Mail eliminado correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en MailController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar(){

        $response = [
            'msj'   => 'Lista de Mails',
            'mails' => Mail::all(),
        ];

        return response()->json($response, 200);

    }
}
