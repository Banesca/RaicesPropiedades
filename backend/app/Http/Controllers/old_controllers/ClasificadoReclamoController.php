<?php

namespace App\Http\Controllers;

use App\clasificado_reclamo;
use App\StatusReclamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ClasificadoReclamoController extends Controller {

    public function add(Request $request) {

        $this->validate($request, [
            'nombre'             => 'required',
            'fk_idStatusReclamo' => 'required',
        ], [
            'nombre.required'             => 'El campo es requerido',
            'fk_idStatusReclamo.required' => 'El campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $validarStatus = StatusReclamo::find($request->fk_idStatusReclamo);

            if (! is_null($validarStatus)) {
                $cla = new clasificado_reclamo($request->all());

                $cla->save();


                $response = [
                    'msj'  => 'Creado Exitosamente',
                    'clasificado' => $cla,
                ];
                DB::commit();

                return response()->json($response, 201);
            } else {
                $response = [
                    'msj'               => 'No existe el status',
                    'statusDisponibles' => StatusReclamo::select([ 'idStatusReclamo', 'descripcion' ])->get(),
                ];

                return response()->json($response, 404);
            }


        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ClasificadoReclamoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function edit(Request $request, $idClasificadoReclamo) {

        if ($request->all() == []) {
            $response = [
                'msj' => 'debe enviar algún parametro para actualizar',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();

        try {
            $cla = clasificado_reclamo::find($idClasificadoReclamo);

            if (! is_null($cla)) {
                $cla->fill($request->all());

                $response = [
                    'msj'         => 'Información actulizada',
                    'clasificado' => $cla,
                ];

                $cla->save();
                DB::commit();

                return response()->json($response, 200);
            } else {
                $response = [
                    'msj' => 'El Clasificado no existe',
                ];

                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ClasificadoReclamoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function borrar($idClasificadoReclamo) {

        DB::beginTransaction();

        try {
            $cla = clasificado_reclamo::findOrFail($idClasificadoReclamo);
            $cla->delete();

            $response = [
                'msj' => 'Eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ClasificadoReclamoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar() {
        $cla      = clasificado_reclamo::get();
        $response = [
            'msj'          => 'Lista',
            'clasificados' => $cla,
        ];

        return response()->json($response, 200);
    }

    public function buscarIdClasificadoReclamo($idClasificadoReclamo) {

        $cla = clasificado_reclamo::find($idClasificadoReclamo);
        if (! is_null($cla)) {

            $response = [
                'msj'          => 'Lista',
                'clasificados' => $cla,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'msj' => 'El Clasificado no existe',
            ];

            return response()->json($response, 404);
        }
    }
}
