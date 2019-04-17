<?php

namespace App\Http\Controllers\API;

use App\ConfigFooter;
use App\Http\Controllers\Controller;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\User;
use App\CouponsClient;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Validator;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller {

    public function login(Request $request) {

        $request->validate([
            'email'       => 'required|string|email',
            'password'    => 'required|string',
            'remember_me' => 'boolean',
        ], [
            'email.required'    => 'El email es requerido',
            'password.required' => 'El contraseña es requerida',
        ]);

        $credentials = request([ 'email', 'password' ]);


        if (! Auth::attempt($credentials)) {
            if (count(User::where('email', $request->email)->get()) > 0) {
                return response()->json([
                    'message' => 'Clave errada',
                ], 401);
            } else {

                return response()->json([
                    'message' => 'usuario no existe',
                ], 401);
            }
        }

        /*if ($request->user()->statusUser == 0) {

            $footer = ConfigFooter::first();

            if(is_null($footer->PerAccUserAprobAdmin) || $footer->PerAccUserAprobAdmin==""){
                $footer->PerAccUserAprobAdmin="0";
            }

            if($footer->PerAccUserAprobAdmin==1){
                return response()->json([
                    'message' => 'SU CUENTA ESTA EN PERIODO DE ACTIVACION. ESTE PROCESO PUEDE TARDAR 24 HS. NO OLVIDES REVISAR TU CASILLA DE MAIL, DONDE RECIBIRAS EL ACCESO A LA WEB. MUCHAS GRACIAS.',
                ], 401);
            }

            /*PARA ACTIVAR LA CUENTA DE UNA VEZ SI NO ESTA ACTIVA*/
            //$request->user()->update(['statusUser'=>1]);

            //Auth::logout();

            /*$u = new UserController();
            $u->reestablecerClave(new Request([ 'email' => $request->email ]));*/

            /*return response()->json([
                'message' => 'La cuenta no ha sido activada, por favor vaya a su correo y siga el vinculo para activarla',
            ], 401);

        }*/
        // idAF=1 viene del fron
        // idAF=2 viene del admin


        // PARA LIMITAR EL ACCESO, SOLO LOS ADMINISTRADORES PUEDEN ACCEDER AL ADMIN
        /*if (isset($request->idAF) && $request->idAF == 2 && $request->user()->fk_idPerfil !=1  ){
          return response()->json([
                'message' => 'Su usuario no tiene acceso a esta plataforma',
            ], 401);
        }*/

        // PARA LIMITAR EL ACCESO, SOLO LOS CLIENTES PUEDEN ACCEDER AL FRONT
       /* if (isset($request->idAF) && $request->idAF == 1 && $request->user()->fk_idPerfil !=2  ){
          return response()->json([
                'message' => 'Su usuario no tiene acceso a esta plataforma',
            ], 401);
        }*/

        $user = $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;


        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addDay();

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type'   => 'Bearer',
            'expires_at'   => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
        ]);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return [string] message
     */
    public function logout(Request $request) {

        $request->user()->token()->revoke();

        return response()->json([
            'message' => 'Se ha desconectado correctamente',
        ]);
    }

    /**
     * Get the authenticated User
     *
     * @return [json] user object
     */
    public function user(Request $request) {

        $u = $request->user();


        // Buscamos el usuario de DEPOCITO si es chofer o cliente //
        /*if ($u->fk_idPerfil == 3) {// Chofer
            $userDc = $this->getUserDriverDC($u->email);
            if ($userDc != "") {
                $u->Codigo_Transporte = @$userDc->Codigo_Transporte;
                $u->update();// Actualizamos el codigo de transporte


                $u->auto = @$userDc->Modelo_Transporte." - ".@$userDc->Patente_Transporte;
                $u->totalImport = @$userDc->totalImport;

                $rsc = DB::select("SELECT  ROUND(IFNULL((select IFNULL(sum(tb_order_header.stars),0) AS stars from  tb_order_header  where  fk_idUserDriver = 1 and fk_idStateOrder = 1)/
                ( select IFNULL(COUNT(*),0) AS stars from  tb_order_header  where  fk_idUserDriver = $u->id and fk_idStateOrder = 1),0),1)
                promedio");

                $u->start = $rsc[0]->promedio;
            }
        } elseif ($u->fk_idPerfil == 2) {// Cliente
            $userDc = $this->getUserClientDC($u->email);
            if ($userDc != "") {
                $u->Codigo_Cliente = @$userDc->Codigo_Cliente;
                $u->update();// Actualizamos el codigo de cliente

                $u->phone = @$userDc->Telefonos_Cliente;
                $u->addres = @$userDc->Domicilio_Cliente;
                $u->totalOrder = @$userDc->totalImport;
                $u->totslCupons = CouponsClient::where("fk_idUser", "=", $u->id)
                    ->leftjoin("tb_coupons", "tb_coupons.idCoupons", "=", "tb_coupons_client.fk_idCoupons")
                    ->leftjoin("tb_productos", "tb_productos.idProducto", "=", "tb_coupons.fk_idProducto")
                    ->where("tb_coupons_client.fk_idSatate", "=", "1")
                    ->get();
            }
        }*/

        try {
            //$u->img_perfil = asset('storage/perfil/'.$request->user()->fotoPerfil); // Podemos solicitar la URL directamente aca

            return response()->json($u, 200);
        } catch (\Exception $e) {
            Log::error('Ha ocurrido un error en AuthController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
            ], 500);
        }
    }

}