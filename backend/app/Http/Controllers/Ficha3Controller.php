<?php

namespace App\Http\Controllers;

use App\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Ficha3Controller extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            'fk_ficha2' => 'required',
        ], [
            'fk_ficha2.required' => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $propiedad = new Propiedad($request->all());

            $propiedad->save();
            /*$propiedad->each(function ($propiedad){
                $propiedad->ficha2and1->
            });*/
            $response = [
                'msj'    => 'Propiedad creada Exitosamente',
                'ficha3' => $propiedad,
                'ficha2' => [
                    'imagen1'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen1),
                    'imagen2'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen2),
                    'imagen3'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen3),
                    'imagen4'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen4),
                    'imagen5'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen5),
                    'imagen6'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen6),
                    'imagen7'             => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen7),
                    'imagen_para_galeria' => asset('storage\\ficha2\\'.@$propiedad->ficha2and1->imagen_para_galeria),

                ]
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
