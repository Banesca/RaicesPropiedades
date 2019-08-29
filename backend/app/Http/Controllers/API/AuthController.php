<?php

namespace App\Http\Controllers\API;

use App\ConfigFooter;
use App\CouponsClient;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Laravel\Socialite\Facades\Socialite;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        if (! isset($request->idUser) || is_null($request->idUser)) {
            $request->validate([
                'email'       => 'required|string|email',
                'password'    => 'required|string',
                'remember_me' => 'boolean',
            ], [
                'email.required'    => 'El email es requerido',
                'password.required' => 'El contraseña es requerida, si inició sesión con google debe entral con el link de google y cambiar su clave desde su perfil',
            ]);
        }
        $cre;

        if (isset($request->idUser) && ! is_null($request->idUser)) {
            //para autenticar solo con el id
            $cre = Auth::loginUsingId($request->idUser);
        } else {
            //para autenticar con el email y el password
            $credentials = request(['email', 'password']);
            $cre = Auth::attempt($credentials);
        }


        if (! $cre) {
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

        $user = is_null(@$request->user()) ? Auth::user() : $request->user();

        $tokenResult = $user->createToken('Personal Access Token');
        $token       = $tokenResult->token;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addDay();
        }

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
    public function logout(Request $request)
    {

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
    public function user(Request $request)
    {

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
            Log::error('Ha ocurrido un error en AuthController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
            ], 500);
        }
    }

    public function redirectToProvider()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback()
    {
        try {
            $user = Socialite::driver('google')->user();
        } catch (\Exception $e) {
            return 'Problemas al autenticar con el servicio de Google';
        }

        // comprobar si existe el usuario
        $existingUser = User::where('email', $user->email)->first();
        if ($existingUser) {
            //loguar si existe
            return $this->login(new Request(['idUser' => $existingUser->id]));
        } else {
            // crear un nuevo usuario y luego regresar el tocken
            $newUser                = new User;
            $newUser->name          = $user->name;
            $newUser->email         = $user->email;
            $newUser->fk_statusUser = 1;

            $newUser->save();

            return $this->login(new Request(['idUser' => $newUser->id]));
        }
    }
}