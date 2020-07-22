<?php

namespace App\Http\Controllers;

use App\Mail\SuscripcionMail;
use App\Suscripcion;
use App\SuscripcionUser;
use function count;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use function response;

class SuscripcionController extends Controller {

    public function nuevaSus(Request $request) {

        $this->validate($request, [
            'email' => 'required|email|unique:tb_suscripcions,email,2,fk_idStatusSistema',
        ], [
            'email.unique'   => 'Este Email ya se encuentra en uso',
            'email.email'    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required' => 'El Email es requerido',
        ]);


        DB::beginTransaction();

        try {
            if (count(Suscripcion::where('email', $request->email)->where('fk_idStatusSistema', 2)->get()) > 0) {
                Suscripcion::where('email', $request->email)->where('fk_idStatusSistema', 2)->delete();
            }

            $sus                     = new Suscripcion($request->all());
            $sus->fk_idStatusSistema = 1;
            $sus->generateToken();

            $sus->save();
            $sus->status;

            Mail::to($request->email)->send(new SuscripcionMail($sus));

            $response = [
                'msj'         => 'Suscripción Creada Satisfactoriamente',
                'suscripcion' => $sus,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en SuscripcionController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function cambiarStatusSus(Request $request, $id) {
        $this->validate($request, [
            'fk_idStatusSistema' => 'required',
        ], [
            'fk_idStatusSistema.required' => 'El estatus es requerido',
        ]);

        DB::beginTransaction();

        try {

            $sus = Suscripcion::find($id);

            if ($sus) {
                $sus->fk_idStatusSistema = $request->fk_idStatusSistema;
                $sus->save();
                $sus->status;

                $response = [
                    'msj'         => 'Status de la suscripcion cambiada',
                    'suscripcion' => $sus,
                ];


                DB::commit();

                return response()->json($response);
            } else {
                $response = [
                    'msj' => 'No existe la suscripcion con ese id',
                ];

                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en SuscripcionController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function cancelarSus(Request $request, $id) {

        $this->validate($request, [
            'motivoDeCancelacion' => 'required',
        ], [
            'motivoDeCancelacion.required' => 'El motivo de la cancelación es requerido',
        ]);

        $sus = Suscripcion::find($id);

        if ($sus) {
            $sus->fill([ 'fk_idStatusSistema' => 2, 'motivoDeCancelacion' => $request->motivoDeCancelacion ]);
            $sus->save();

            $response = [
                'msj'         => 'Suscripcion cancelada',
                'suscripcion' => $sus,
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'msj' => 'No existe la suscripcion con ese id',
            ];

            return response()->json($response, 404);
        }
    }

    public function listarSuscripciones() {

        $sus      = Suscripcion::get();
        $response = [
            'msj'         => 'Suscripcion',
            'suscripcion' => $sus->each(function($sus) {
                $sus->estatusSitema;
            }),
        ];

        return response()->json($response, 200);
    }

    public function listarSuscripcionesCanceladas() {

        $sus = Suscripcion::where('fk_idStatusSistema', 2)->get();

        $response = [
            'msj'         => 'Suscripciones canceladas',
            'suscripcion' => $sus->each(function($sus) {
                $sus->estatusSitema;
            }),
        ];

        return response()->json($response, 200);
    }

    public function buscarSuscripcionPorEmail($email) {
        $sus = Suscripcion::where('email', $email)->get();

        $response = [
            'count'       => count($sus),
            'suscripcion' => $sus->each(function($sus) {
                $sus->estatusSitema;
            }),
        ];

        return response()->json($response, 200);
    }

    public function cancelarSuscripcionTocken(Request $request, $tocken) {
        $suscripcion = Suscripcion::where('tocken', $tocken)->first();

        if (! is_null($suscripcion)) {
            $suscripcion->fill($request->all());
            $suscripcion->fk_idStatusSistema = 2;
            $suscripcion->tocken             = null;
            $suscripcion->save();

            return response()->json('listo', 201);
        } else {
            $response = [
                'msj' => 'No existe la suscripcion',
            ];

            return response()->json($response, 404);
        }
    }

    public function filter(Request $request) {
        $busqueda = "%".$request->search."%";

        $resultadoUnico = SuscripcionUser::
        where(function($query)
        use (
            $busqueda
        ) {
            $query->orwhere('titulo', 'like', $busqueda);
            $query->orwhere('descripcion', 'like', $busqueda);
        })
            ->get();


        return response()->json([ 'request' => $resultadoUnico ]);
    }

    public function filterSuscriptores(Request $request) {
        $busqueda = "%".$request->search."%";

        $resultadoUnico = Suscripcion::
        where(function($query) use ($busqueda) {
            $query->where('email', 'like', $busqueda);
            $query->orwhere('motivoDeCancelacion', 'like', $busqueda);
            $query->orwhere('sugerencia', 'like', $busqueda);
            $query->wherehas('status', function($query) use ($busqueda) {
                $query->orwhere('descripcion', 'like', $busqueda);
            });
        })
            ->get();


        return response()->json([ 'request' => $resultadoUnico ]);
    }
}
