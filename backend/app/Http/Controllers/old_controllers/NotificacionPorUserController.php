<?php

namespace App\Http\Controllers;

use App\NotificacionPorUser;
use App\User;
use Illuminate\Http\Request;

class NotificacionPorUserController extends Controller {

    public function addStatusNotificacion(Request $request) {

        $users=User::all();
        foreach ($users as $user){
            $noti = new NotificacionPorUser();
            $noti->idUser = $user->id;
            $noti->status = 1;
            $noti->fk_idNotification = $request->fk_idNotification;
            $noti->save();
        }

        $response = [
            'msj'  => 'Status de Notificacion cambiada correctamente',
        ];

        return response()->json($response, 200);
    }

    public function statusPorUser($idUser=null){
        $query = User::query();

        if (! is_null($idUser)) {
            $query = $query
                ->where('id', $idUser)
                ->where(function ($query) {
                    $query->where('fk_idPerfil', 2)
                        ->orwhere('fk_idPerfil', 3);
                });
        }else{
            $query = $query
                ->where(function ($query) {
                    $query->where('fk_idPerfil', 2)
                        ->orwhere('fk_idPerfil', 3);
                });
        }

        return response()->json($query->with('notificacionPorUser','notificacionPorUser.notificacion','notificacionPorUser.status')->get(), 200);

    }
}
