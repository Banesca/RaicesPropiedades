<?php

namespace App\Http\Controllers;

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
            'email.required'       => 'El Email es requerido',
            'descripcion.required' => 'La descripción es requerida',
        ]);

        DB::beginTransaction();

        try {

            $sus                     = new SuscripcionUser($request->all());

            $sus->save();

            //Mail::to($request->email)->send(new SuscripcionMail($sus));

            $response = [
                'msj'               => 'Suscripción Creada Satisfactoriamente',
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
}
