<?php

namespace App\Http\Controllers;

use App\DuracionAlimento;
use App\User;
use Illuminate\Http\Request;

class NotificacionDuracionAlimentoController extends Controller
{
    public function agregarDuracion (Request $request, $idUser)
    {

        //$request->duracion

        $User = User::find($idUser);

        if (!is_null($User)) {

            $this->validate($request, [
                'duracion' => 'required|integer',
            ], [
                'duracion.required' => 'El campo es requerido',
                'duracion.integer' => 'El campo debe ser numerico',
            ]);


            $duracion            = new DuracionAlimento($request->all());
            $duracion->fk_idUser = $idUser;
            $duracion->save();
            $duracion->user;

            $response = [
                'msj' => 'Duracion Agregada correctamente',
                'duracion' => $duracion
            ];

            return response()->json($response, 201);

        } else {

            $response = [
                'msj' => 'Usuario no existe',
            ];

            return response()->json($response, 404);
        }
    }

    public function agregarFechaRecordatorio (Request $request, $idDuracionAlimentos)
    {

        //$request->fechaNotificacion

        $duracion = DuracionAlimento::find($idDuracionAlimentos);

        if (!is_null($duracion)) {

            $this->validate($request, [
                'fechaNotificacion' => 'required|date',
            ], [
                'fechaNotificacion.required' => 'El campo es requerido',
                'fechaNotificacion.date' => 'El campo debe ser tipo fecha AAAA-MM-DD',
            ]);

            $duracion->fechaNotificacion = $request->fechaNotificacion;
            $duracion->save();

            $response = [
                'msj' => 'Fecha de notificación Agregada correctamente',
                'duracion' => $duracion
            ];

            return response()->json($response, 201);

        } else {
            $response = [
                'msj' => 'No hay registros con el id: ' . $idDuracionAlimentos,
            ];

            return response()->json($response, 404);
        }
    }

    public function getTodo ()
    {
        $duraciones = DuracionAlimento::all();
        $response   = [
            'msj' => 'Lista de duraciones',
            'duraciones' => $duraciones
        ];

        return response()->json($response, 201);

    }

    public function editar (Request $request, $idDuracionAlimentos)
    {

        $duracion = DuracionAlimento::find($idDuracionAlimentos);

        if (!is_null($duracion)) {

            if (count($request->all()) > 0) {
                $duracion->fill($request->all());
                $duracion->idDuracionAlimentos = $idDuracionAlimentos; //para que no se puede cambiar el id e la duracion
                $duracion->save();

                $response = [
                    'msj' => 'Parametros actualizados correctamente',
                    'duracion' => $duracion
                ];

                return response()->json($response, 201);

            } else {
                $response = [
                    'msj' => 'Debe enviar algun parámetro para actualizar "duracion" "fk_idUser" "fk_idProducto" "fechaNotificacion"',
                ];

                return response()->json($response, 404);
            }

        } else {
            $response = [
                'msj' => 'No hay registros con el id: ' . $idDuracionAlimentos,
            ];

            return response()->json($response, 404);
        }

    }
}
