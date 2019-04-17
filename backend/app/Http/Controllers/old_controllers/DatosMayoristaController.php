<?php

namespace App\Http\Controllers;

use App\DatosMayorista;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatosMayoristaController extends Controller {
    public function add(Request $request) {
        $this->validate($request, [
            'NOMBRE_LOCAL_MAYORISTA'    => 'required',
            'DOMICILIO_LOCAL_MAYORISTA' => 'required',
            //'TELEFONO_LOCAL_MAYORISTA'  => 'required',
            //'TELEFONO_USER'             => 'required',
            //'fk_idUser'                 => 'required|unique:tb_datos_mayoristas,fk_idUser' . $request->idDatosMayorista,

        ], [
            'NOMBRE_LOCAL_MAYORISTA.required'    => 'El NOMBRE DEL LOCAL es requerido',
            'DOMICILIO_LOCAL_MAYORISTA.required' => 'La DOMICILIO DEL LOCAL es requerido',
            //'TELEFONO_LOCAL_MAYORISTA.required'  => 'La TELEFONO DEL LOCAL es requerido',
            //'TELEFONO_USER.required'             => 'La TELEFONO DEL CLINTE es requerido',
            //'fk_idUser.required'                 => 'La fk_idUser es requerido',
            //'fk_idUser.unique'                   => 'El id de usuario ya esta en uso, por favor actualice la informacion',
        ]);

        $user = User::find($request->fk_idUser);
        if (is_null($user)) {
            $response = [
                'msj' => 'El usuario no existe',
            ];

            return response()->json($response, 200);
        }

        DB::beginTransaction();

        try {

            $datosMayorista = new DatosMayorista($request->all());
            $datosMayorista->save();

            $response = [
                'msj'   => 'Los datos del mayorista fueron Creados exitosamente',
                'datos' => $datosMayorista,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en DatosMayoristaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function edit(Request $request, $idDatosMayorista) {
        $this->validate($request, [
            'NOMBRE_LOCAL_MAYORISTA'    => 'required',
            'DOMICILIO_LOCAL_MAYORISTA' => 'required',
            //'TELEFONO_LOCAL_MAYORISTA'  => 'required',
            'TELEFONO_USER'             => 'required',
            //'fk_idUser'                 => 'required|unique:tb_datos_mayoristas,fk_idUser,' . $request->idDatosMayorista . ',idDatosMayorista',
        ], [
            'NOMBRE_LOCAL_MAYORISTA.required'    => 'El NOMBRE DEL LOCAL es requerido',
            'DOMICILIO_LOCAL_MAYORISTA.required' => 'La DOMICILIO DEL LOCAL es requerido',
            //'TELEFONO_LOCAL_MAYORISTA.required'  => 'La TELEFONO DEL LOCAL es requerido',
            //'TELEFONO_USER.required'             => 'La TELEFONO DEL CLINTE es requerido',
            //'fk_idUser.required'                 => 'La fk_idUser es requerido',
        ]);


        if (! is_null($request->fk_idUser)) {

            $d = DatosMayorista::where('fk_idUser', $request->fk_idUser)->get();

            if (count($d) > 0 && $d[0]->idDatosMayorista != $request->idDatosMayorista) {
                $response = [
                    'msj' => 'El Usuario ya se encuentra en la lista, y no se puede repetir',
                ];

                return response()->json($response, 403);
            }
        }


        DB::beginTransaction();

        try {
            $datosMayorista = DatosMayorista::findOrFail($idDatosMayorista);
            $copiaUser      = $datosMayorista->fk_idUser;
            $datosMayorista->fill($request->all());
            $datosMayorista->fk_idUser = $copiaUser;
            $response                  = [
                'msj'   => 'Los datos del mayorista fueron Creados exitosamente',
                'datos' => $datosMayorista,
            ];

            $datosMayorista->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en DatosMayoristaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function delete($idDatosMayorista) {
        DB::beginTransaction();
        try {
            $user = DatosMayorista::findOrFail($idDatosMayorista);
            $user->delete();

            $response = [
                'msj'  => 'Datos eliminados Correctamente',
                'user' => $user,
            ];
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();

            Log::error('Ha ocurrido un error en DatosMayoristaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listarTodos() {
        $datosMayorista = DatosMayorista::with('user')->get();

        $response = [
            'msj'   => 'Lista',
            'datos' => $datosMayorista,
        ];

        return response()->json($response, 200);
    }

    public function listarPorId($idUser = null) {
        if (is_null($idUser)) {
            $response = [
                'msj' => 'Debe enviar el id de user',
            ];

            return response()->json($response, 500);
        } else {
            $datosMayorista = DatosMayorista::where('fk_idUser', $idUser)->get();
            if (count($datosMayorista) > 0) {
                $response = [
                    'msj'   => 'Lista',
                    'datos' => $datosMayorista,
                ];

                return response()->json($response, 200);
            }
        }
    }
}
