<?php

namespace App\Http\Controllers;

use App\Modulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModuloController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'modulo' => 'required|unique:tb_modulos,modulo,'.$request->idM.',idM,deleted_at,NULL',
        ], [
            'modulo.required' => 'El Nombre es requerido',
            'modulo.unique'   => 'Este Email ya se encuentra en uso',
        ]);

        DB::beginTransaction();

        try {

            $modulo = new Modulo($request->all());

            $modulo->save();
            $response = [
                'msj'  => 'Modulo Creado Exitosamente',
                'user' => $modulo,
            ];
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ModuloController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function update(Request $request, $idM) {

        DB::beginTransaction();

        try {
            $modulo = Modulo::findOrFail($idM);
            $modulo->fill($request->all());

            $modulo->save();
            DB::commit();

            $response = [
                'msj'    => 'Modulo actualizado exitosamente',
                'modulo' => $modulo,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en ModuloController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idM) {

        DB::beginTransaction();

        try {
            $modulo = Modulo::find($idM);

            if (is_null($modulo)) {

                $response = [
                    'msj' => 'Modulo no existe',
                ];

                return response()->json($response, 401);
            }

            $modulo->delete();
            $response = [
                'msj'  => 'Modulo eliminado correctamente',
                'user' => $modulo,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ModuloController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar(Request $request) {

        if ($request->exists('offset') && $request->exists('limit')) {

            $this->validate($request, [
                'offset' => 'integer|min:1',
                'limit'  => 'integer|min:1',
            ], [
                'offset.integer' => 'Debe ser numérico',
                'limit.integer'  => 'Debe ser numérico',

                'offset.min' => 'Debe tener al menos un número',
                'limit.min'  => 'Debe tener al menos un número',
            ]);

            $modulos = Modulo::offset($request->offset)->limit($request->limit)->get();
        } else {
            $modulos = Modulo::get();
        }

        $response = [
            'msj'     => 'Lista de modulos',
            'modulos' => $modulos,
        ];

        return response()->json($response, 200);
    }

}
