<?php

namespace App\Http\Controllers;

use App\PersonaAutorizada;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PersonaAutorizadaController extends Controller {
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

        DB::beginTransaction();

        try {

            $pa                   = new PersonaAutorizada($request->all());
            $pa->fk_idUserCliente = $request->user()->id;

            $pa->save();
            DB::commit();

            $response = [
                'msj' => 'Agregado correctamente',
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PersonaAutorizadaController: '.$e->getMessage().', Linea: '.$e->getLine());

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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        DB::beginTransaction();

        try {
            $pa = PersonaAutorizada::findOrFail($id);

            $pa->fill($request->all());

            $response = [
                'msj' => 'Info actulizada',
            ];

            $pa->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en PersonaAutorizadaController: '.$e->getMessage().', Linea: '.$e->getLine());

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
    public function destroy($id) {

        DB::beginTransaction();

        try {
            $pa = PersonaAutorizada::findOrFail($id);
            $pa->delete();

            $response = [
                'msj' => 'Eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en PersonaAutorizadaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listarPersonaAutorizada($idUserCliente = null) {

        if (is_null($idUserCliente)) {
            $pa = PersonaAutorizada::with('user')->get();
        } else {
            $pa = PersonaAutorizada::with('user')->where('fk_idUserCliente', $idUserCliente)->get();
        }

        $response = [
            'msj'         => 'Lista de personas autorizadas',
            'autorizados' => $pa,
        ];

        return response()->json($response, 202);
    }
}
