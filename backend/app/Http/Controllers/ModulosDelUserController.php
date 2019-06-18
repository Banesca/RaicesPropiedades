<?php

namespace App\Http\Controllers;

use App\Modulo;
use App\ModulosDelUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModulosDelUserController extends Controller {

    public function asignarModuloAUser(Request $request) {

        $this->validate($request, [
            'fk_idUser'   => 'required',
            'fk_idModulo' => 'required',

        ], [
            'fk_idUser.required'   => 'El campo es requerido',
            'fk_idModulo.required' => 'El campo es requerido',
        ]);

        $mo = ModulosDelUser::where('fk_idUser', $request->fk_idUser)->where('fk_idUser', $request->fk_idModulo)->get();
        if (count($mo) > 0) {

            $response = [
                'msj' => 'El Usuario ya tiene el modulo asignado',
            ];

            return response()->json($response, 404);
        }
    
        $mo_l = Modulo::find($request->fk_idModulo);
        if (is_null($mo_l)) {

            $response = [
                'msj' => 'El módulo que intenta asignar no existe',
            ];

            return response()->json($response, 404);
        }

        $mo_g = new ModulosDelUser($request->all());
        $mo_g->save();

        $response = [
            'msj' => 'Modulo asignado correctamente',
        ];

        return response()->json($response, 201);

    }

    public function eliminarAsignacion($idModuloUser){

        DB::beginTransaction();

        try {
            $mod = ModulosDelUser::find($idModuloUser);

            if (is_null($mod)) {

                $response = [
                    'msj' => 'No existe la asignacion',
                ];

                return response()->json($response, 404);
            }

            $mod->delete();
            $response = [
                'msj'  => 'Asignacion eliminada correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ModulosDelUserController: '.$e->getMessage().', Linea: '.$e->getLine());

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

            $asig = ModulosDelUser::with('user','modulo')->offset($request->offset)->limit($request->limit)->get();
        } else {
            $asig = ModulosDelUser::with('user','modulo')->get();
        }

        $response = [
            'msj'   => 'Lista de Asignaciones',
            'asig' => $asig,
        ];

        return response()->json($response, 202);
    }

}
