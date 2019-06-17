<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Ficha3Controller extends Controller
{
    public function add(Request $request) {

        $this->validate($request, [
            'fk_ficha2'           => 'required',
        ], [
            'fk_ficha2.required'           => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $propiedad = new Propiedad($request->all());

            $propiedad->save();
            $response = [
                'msj'  => 'Propiedad creada Exitosamente',
                'user' => $propiedad,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PropiedadController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }
}
