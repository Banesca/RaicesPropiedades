<?php

namespace App\Http\Controllers;

use App\Mail\NotificarCambioDeStatusReclamoSugerenciaMail;
use App\ReclamosYSugerencia;
use App\StatusReclamo;
use App\User;
use App\Mail\ReclamosSugerenciasMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReclamoSugerenciaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cambiarStatus(Request $request, $id) {

        $this->validate($request, [
            'fk_idStatusReclamo' => 'required|integer|min:1',
        ], [
            'fk_idStatusReclamo.required' => 'Es estatus es requerido',
            'fk_idStatusReclamo.integer'  => 'Debe ser numérico',
            'fk_idStatusReclamo.min'      => 'Debe tener al menos un número',
        ]);


        $statusRec_min=StatusReclamo::min('idStatusReclamo');
        $statusRec_max=StatusReclamo::max('idStatusReclamo');

        if($request->fk_idStatusReclamo>$statusRec_max || $request->fk_idStatusReclamo<$statusRec_min)
        {
            $response = [
                'msj'  => 'El Estatus que intenta asignar No existe',
            ];
            return response()->json($response, 404);

        }else{

            DB::beginTransaction();

            try {
                $rs = ReclamosYSugerencia::findOrFail($id);
                $rs->fill([ 'fk_idStatusReclamo'=> $request->fk_idStatusReclamo ,'motivo_cierre'=>$request->motivo_cierre]);
                $rs->save();

                DB::commit();

                $rs->status;
                $rs->user;

                /*PARA NOTIFICAION A USER */
                Mail::to(Auth::user()->email)->send(new NotificarCambioDeStatusReclamoSugerenciaMail($rs));
                /*PARA NOTIFICAION A USER */

                $response = [
                    'msj'  => 'Status del Reclamo o sugerencia actualizado',
                    'user' => $rs,
                ];

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en ReclamoController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }

        }



    }

    public function obtenerStatus() { //para obtener los posibles estatus de un reclamo
        return StatusReclamo::orderby('descripcion', 'desc')->get();
    }

    public function index() {
        $r = ReclamosYSugerencia::orderby('idReclamosSugerencia', 'desc')->get(); // Todos 
        $r_abiertos = ReclamosYSugerencia::orderby('idReclamosSugerencia', 'desc')->where('fk_idStatusReclamo',1)->get(); //Abiertos
        $r_recibido = ReclamosYSugerencia::orderby('idReclamosSugerencia', 'desc')->where('fk_idStatusReclamo',3)->get(); //Recibido
        $r_cerrado = ReclamosYSugerencia::orderby('idReclamosSugerencia', 'desc')->where('fk_idStatusReclamo',2)->get(); //Cerrado
        
        $r->each(function($r){
            $r->statusReclamoSugerencia = $r->status->descripcion;
        });
        
        return response()->json([
            'todos' => $r,
            'r_abiertos' => $r_abiertos,
            'r_recibido' => $r_recibido,
            'r_cerrado' => $r_cerrado
        ]);
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
            'titulo'      => 'required',
            'descripcion' => 'required',
        ], [
            'titulo.required'      => 'El título es requerido',
            'descripcion.required' => 'La descripción es requerida',
        ]);

        DB::beginTransaction();

        try {

            $rs                     = new ReclamosYSugerencia($request->all());
            $rs->fk_idUser          = $request->fk_idUser;
            $rs->fk_idStatusReclamo = 1; //para iniciar en estatus abierto
            $rs->save();
            $rs->status;
            $rs->user;

            DB::commit();

            $response = [
                'msj'                  => 'Reclamo y o notificación Creada, Su numero de ticket es: '.$request->numero_ticket,
                'reclamo_notificacion' => $rs,
            ];

            $user = User::where('id', $rs->fk_idUser)->first();
            
            Mail::to($user->email)->send( new ReclamosSugerenciasMail($rs) );

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ReclamoController: '.$e->getMessage().', Linea: '.$e->getLine());

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
    public function update(Request $request, $id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }
}
