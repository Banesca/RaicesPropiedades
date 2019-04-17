<?php

namespace App\Http\Controllers;

use App\NotificacionPorUser;
use App\Notification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class NotificationController extends Controller
{
    public function listar()
    {

        $noti     = Notification::orderby('created_at', 'desc')->get();
        $response = [
            'msj'    => 'Lista de notificaciones',
            'notifi' => $noti,
        ];

        return response()->json($response, 201);
    }

    public function getByIdUser($idUser)
    {
        /*$noti     = Notification::where("fk_idUser", "=", $idUser)
            ->orWhere("fk_idUser", "=", '')
            ->get();*/

        $noti     = NotificacionPorUser::with('status')->where('idUser', $idUser)->get();

        $response = [
            'msj'    => 'Lista de notificaciones',
            'notifi' => $noti,
        ];

        return response()->json($response, 201);
    }

    public function cambiarStatus(Request $request)
    {
        /*$rs = Notification::orderby('created_at','desc')->findOrFail($idNotification);
        $rs->fill([ 'isConfirm' => 1 ]);
        $rs->save();*/
        $rs = NotificacionPorUser::find($request->idNotiUser);
        if($request->status==3){
            $rs->delete();
             $response = [
                'msj' => 'Estatus Cambiado Exitosamente',
            ];

            return response()->json($response, 201);
        }
        $rs = NotificacionPorUser::find($request->idNotiUser);
        $rs->fill(['status' => $request->idStatusNoti]);
        $rs->save();

        $response = [
            'msj' => 'Estatus Cambiado Exitosamente',
        ];

        return response()->json($response, 201);
    }

    public function add(Request $request)
    {

        $this->validate($request, [
            'titleNotification'       => 'required',
            'descriptionNotification' => 'required',
            'fk_idSecctionApp'        => 'required',
        ], [
            'titleNotification.required'       => 'Este campo es requerido',
            'descriptionNotification.required' => 'Este campo es requerido',
            'fk_idSecctionApp.required'        => 'Este campo es requerido',
        ]);

        DB::beginTransaction();
        try {

            $notifications                          = new Notification();
            $notifications->titleNotification       = $request->titleNotification;
            $notifications->descriptionNotification = $request->descriptionNotification;
            $notifications->fk_idSecctionApp        = $request->fk_idSecctionApp;
            $notifications->fk_idUser               = Auth::user()->fk_idPerfil;
            $notifications->save();
            DB::commit();

            $response = [
                'msj' => 'Notificacion enviada',
            ];

            $data = [
                'descriptionNotification' => @$request->descriptionNotification,
                'idSecctionApp'           => $request->fk_idSecctionApp,
            ];

            /*Creando status inicial de notificacion*/
            $notificacion_User = new NotificacionPorUserController();
            $notificacion_User->addStatusNotificacion(new Request([
                'fk_idNotification' => $notifications->idNotification,
            ]));

           $this->sendNotificationFb($notifications->titleNotification, $data);

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en NotificationController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    // ENVIO DE NOTIFICACION FIRE BASE //
    public static function sendNotificationFb($title, $data, $tokenFB = null)
    {

        $notification = [
            'title'   => $title, // works fine here
            'body'    => $data['descriptionNotification'],
            'sound'   => 'default',
            'vibrate' => 'default',
        ];

        if ($tokenFB != null) {
            $param = [
                "to"           => $tokenFB,
                "notification" => $notification,
                "data"         => $data,
            ];
        } else {
            // Buscamos todo los usuarios y notificamos 
            $user = User::select("tokenFirebase")->where("tokenFirebase", "!=", '')->get();

            $json = [];
            foreach ($user as $item) {
                array_push($json, $item->tokenFirebase);
            }

            $param = [
                "registration_ids" => $json,
                "notification"     => $notification,
                "data"             => $data,
            ];
        }

        $headers = [
            'Authorization: key=AIzaSyCChm0n6Os-QU6wTNRxoebAUQY9QDysT1U',
            'Content-Type: application/json',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($param));


        $result = curl_exec($ch);
        curl_close($ch);
        //dd($result);

    }

    public function update(Request $request, $idNotification)
    {

        $this->validate($request, [
            'titleNotification'       => 'required',
            'descriptionNotification' => 'required',
            'fk_idSecctionApp'        => 'required',
        ], [
            'titleNotification.required' => 'Este campo es requerido',
            'fk_idSecctionApp.required'  => 'Este campo es requerido',
            '.required'                  => 'Este campo es requerido',
        ]);

        DB::beginTransaction();

        try {
            $notifications = Notification::findOrFail($idNotification);
            $notifications->fill($request->all());

            $response = [
                'msj'  => 'Info de la notificacion actulizada',
                'noti' => $notifications,
            ];

            $notifications->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en NotificationController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idNotification)
    {

        DB::beginTransaction();

        try {
            $notifications = Notification::findOrFail($idNotification);
            $notifications->delete();

            $response = [
                'msj' => 'Notificacion eliminada Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en OfertaController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }
}
