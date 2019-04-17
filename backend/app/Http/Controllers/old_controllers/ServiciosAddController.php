<?php

namespace App\Http\Controllers;

use App\serviciosAdd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ServiciosAddController extends Controller {

    public function crearServicioAdd(Request $request) {

        $this->validate($request, [
            'fk_idClasificado' => 'required',
            'fk_idLocal'       => 'required',
            'fechaHora'        => 'required',
            'status'           => 'required',
            'fk_idUser'        => 'required',
        ], [
            'fk_idClasificado.required' => 'La campo es requerido',
            'fk_idLocal.required'       => 'El campo es requerido',
            'fechaHora.required'        => 'El campo es requerido',
            'status.required'           => 'El campo es requerido',
            'fk_idUser.required'        => 'El campo es requerido',
        ]);


        DB::beginTransaction();

        try {

            $o = new serviciosAdd($request->all());

            $o->save();

            $response = [
                'msj' => 'Servicio Creado',
                'Add' => $o,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en crearServicioAdd: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function editarServicioAdd(Request $request, $idServiciosAdd) {

        DB::beginTransaction();
        if (is_null($request->all())) {

            $response = [
                'msj' => 'Debe pasar algun parámetro que desee actualizar',
            ];

            return response()->json($response, 404);
        } else {
            try {
                $o = serviciosAdd::findOrFail($idServiciosAdd);

                $o->fill($request->all());

                $response = [
                    'msj' => 'Info actulizada',
                    'Add' => $o,
                ];

                $o->save();
                DB::commit();

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en crearServicioAdd: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }
    }

    public function eliminarServicioAdd($idServiciosAdd) {

        DB::beginTransaction();

        try {

            $o = serviciosAdd::findOrFail($idServiciosAdd);
            $o->delete();


            $response = [
                'msj' => 'Destacado eliminado Correctamente',
                'Add' => $o,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en crearServicioAdd: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar() {
        $o = serviciosAdd::with(['user','clasificado'])->get();

        $response = [
            'msj' => 'Lista de ServiciosAdd',
            'Add' => $o,
        ];

        return response()->json($response, 200);
    }
}
