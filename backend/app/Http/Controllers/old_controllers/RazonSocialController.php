<?php

namespace App\Http\Controllers;

use App\RazonSocial;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RazonSocialController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $this->validate($request, [
            'fk_idCliente' => 'required',
        ], [
            'fk_idCliente.required' => 'El campo es requerido',
        ]);


        $user = User::find($request->fk_idCliente);

        if (is_null($user)) {
            $response = [
                'msj' => 'El usuario (fk_idCliente) no existe',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();

        try {

            $razonSocial = new RazonSocial($request->all());

            $razonSocial->save();
            $razonSocial->user;

            $response = [
                'msj'  => 'Razon social creada exitosamente',
                'user' => $razonSocial,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en RazonSocialController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idRazonSocial) {
        DB::beginTransaction();

        try {

            $user = User::find($request->fk_idCliente);

            if (is_null($user)) {
                $response = [
                    'msj' => 'El usuario (fk_idCliente) no existe',
                ];

                return response()->json($response, 404);
            }

            $razonSocial = RazonSocial::find($idRazonSocial);


            if (is_null($razonSocial)) {
                $response = [
                    'msj' => 'La razon social no existe',
                ];

                return response()->json($response, 404);
            }

            $razonSocial->update($request->all());

            $response = [
                'msj'    => 'Info de la razon social actulizada',
                'perfil' => $razonSocial,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en RazonSocialController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRazonSocial) {
        DB::beginTransaction();

        try {
            $razonSocial = RazonSocial::findOrFail($idRazonSocial);
            $razonSocial->delete();

            $response = [
                'msj' => 'Eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en RazonSocialController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar($idRazonSocial = null) {

        if (is_null($idRazonSocial)) {
            $pa = RazonSocial::with('user')->get();
        } else {
            $pa = RazonSocial::with('user')->where('fk_idCliente', $idRazonSocial)->get();
        }

        $response = [
            'msj'         => 'Lista de Razon social',
            'autorizados' => $pa,
        ];

        return response()->json($response, 202);
    }
}
