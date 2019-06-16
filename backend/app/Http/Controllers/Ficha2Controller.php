<?php

namespace App\Http\Controllers;

use App\Ficha2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Ficha2Controller extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            'imagen_para_galeria' => 'required',
            'fk_ficha1'           => 'required',
        ], [
            'imagen_para_galeria.required' => 'El Campo es requerido',
            'fk_ficha1.required'           => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $ficha2 = new Ficha2($request->all());

            $ficha2->save();
            $response = [
                'msj'  => 'Ficha 2 creada Exitosamente',
                'user' => $ficha2,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en Ficha2Controller: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

}
