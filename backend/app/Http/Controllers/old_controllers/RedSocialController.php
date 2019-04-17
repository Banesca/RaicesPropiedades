<?php

namespace App\Http\Controllers;

use App\RedesSocial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RedSocialController extends Controller {

    public function getRedes(){
        $r =  RedesSocial::first();
        if(is_null($r)){
            return response()->json('null',200);
        }else{
            return response()->json($r,200);
        }
    }

    public function store(Request $request) {

        if (is_null($request)) {
            $response = [
                'msj' => 'Debe enviar algun dato para crear',
            ];

            return response()->json($response, 400);

        } else {

            DB::beginTransaction();
            try {

                $redsocial = new RedesSocial($request->all());
                $redsocial->save();
                $response = [
                    'msj'  => 'Creado Satisfactoriamente',
                    'user' => $redsocial,
                ];
                DB::commit();

                return response()->json($response, 201);
            } catch (\Exception $e) {

                DB::rollback();
                Log::error('Ha ocurrido un error en RedSocialController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }
    }

    public function updateRedesSociales(Request $request, $id_redSocial) {
        if (is_null($request)) {
            $response = [
                'msj' => 'Debe enviar algún dato para actualizar',
            ];

            return response()->json($response, 400);
        } else {

            DB::beginTransaction();

            try {
                $redsocial = RedesSocial::findOrFail($id_redSocial);

                $redsocial->fill($request->all());

                $response = [
                    'msj'  => 'Info actulizada',
                    'user' => $redsocial,
                ];

                $redsocial->save();
                DB::commit();

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en RedSocialController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }
    }

}
