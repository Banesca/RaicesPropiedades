<?php

namespace App\Http\Controllers;

use App\ServiciosWeb;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class ServiciosWebController extends Controller {

    public function crer(Request $request) {

        $this->validate($request, [
            'titulo'          => 'required',
            'descripcion'     => 'required',
            'fk_idStatus'     => 'required',
            'fk_idListaEmail' => 'required',
            'foto'            => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'titulo.required'          => 'Es requerido',
            'descripcion.required'     => 'Es requerido',
            'fk_idStatus.required'     => 'Es requerido',
            'fk_idListaEmail.required' => 'Es requerido',

            'foto.required' => 'La foto de perfil es requerida',

        ]);

        DB::beginTransaction();

        try {

            $sweb = new ServiciosWeb($request->all());

            $sweb->save();

            $response = [
                'msj'  => 'Servicio Creado',
                'sercicio' => $sweb,
            ];
            DB::commit();


            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ServiciosWebController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }
}
