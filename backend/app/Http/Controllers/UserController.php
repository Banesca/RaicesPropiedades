<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
use App\Mail\EnviarTokenMail;
use App\Mail\Prueba;
use App\Perfil;
use App\PerfilCliente;
use App\Suscripcion;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Image;

class UserController extends Controller {

    public function prueba() {

        $curl = curl_init();

/*GENERADO LA CODIFICACION URL EN BASE A ARRAY*/
        $contenido=http_build_query([
            'usr' => 'integrador@argenprop.com',
            'psd' => '123456',
            'tipoPropiedad' => '1',
            'aviso.EsWeb' => 'false',
            'aviso.Titulo' => 'DEPARTAMENTO%20TEST',
            'aviso.IdOrigen' => '575Y_90992AA4',
            'aviso.SistemaOrigen.Id' => '103',
            'aviso.TipoOperacion' => '1',
            'aviso.Vendedor.IdOrigen' => '575Y_',
            'aviso.Vendedor.SistemaOrigen.Id' => '10',
            'aviso.Vendedor.Id' => '242566',
            'aviso.InformacionAdicional' => 'Departamento%20de%20test.',
            'propiedad.Direccion.Localidad.Id' => '2',
            'propiedad.Direccion.Nombrecalle' => 'PIEDRAS',
            'propiedad.Direccion.Numero' => '1745',
            'propiedad.Direccion.Piso' => '1',
            'propiedad.Direccion.Coordenadas.Latitud' => '-34%2C5840767',
            'propiedad.Direccion.Coordenadas.Longitud' => '-58%2C4142833',
            'propiedad.SuperficieCubierta' => '81',
            'propiedad.Antiguedad' => '30',
            'propiedad.Disposicion' => '3',
            'propiedad.Orientacion' => '8',
            'propiedad.TipoUnidad' => '3',
            'propiedad.Estado' => '2',
            'propiedad.CantidadBanos' => '1',
            'propiedad.CantidadAmbientes' => '3',
            'propiedad.CantidadDormitorios' => '2',
            'propiedad.Ambientes.Balcon' => 'True',
            'propiedad.Ambientes.Bano' => 'True',
            'propiedad.Servicios.GasNatural' => 'True',
            'propiedad.Servicios.AguaCorriente' => 'True',
            'propiedad.Edificio.CantidadPisos' => '7',
            'visibilidades.MontoOperacion' => '150000',
            'visibilidades.Moneda.Id' => '2'
        ]);
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://www.inmuebles.clarin.com/Publicaciones/PublicarIntranet?contentType=json",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $contenido,
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
               // "cache-control: no-cache",
                "content-type: application/x-www-form-urlencoded",
               // "postman-token: d0b4a2ae-696c-01aa-605b-6e16a8788770"
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }

    public function buscarPersonas(Request $request) {

        //$request->search
        //$request->searchRol

        $busqueda = "%".$request->search."%";

        $BuscarSearchRol = "%".$request->searchRol."%";

        $query = User::query();

        if (! is_null($request->search)) {

            $query = $query
                ->where('name', 'like', $busqueda)
                ->orWhere('email', 'like', $busqueda);
        }

        return response()->json($query->with('statusUser')->get(), 200);
    }

    public function listar(Request $request) {

        if ($request->exists('offset') && $request->exists('limit')) {

            $this->validate($request, [
                'offset' => 'integer|min:1',
                'limit'  => 'integer|min:1',
            ], [
                'offset.integer' => 'Debe ser numérico',
                'limit.integer'  => 'Debe ser numérico',

                'offset.min' => 'Debe tener al menos un número',
                'limit.min'  => 'Debe tener al menos un número',
            ]);

            $users = User::with('statusUser')->offset($request->offset)->limit($request->limit)->get();
        } else {
            $users = User::with('statusUser')->get();
        }

        $response = [
            'msj'   => 'Lista de usuarios',
            'users' => $users,
        ];

        return response()->json($response, 202);
    }

    public function index() {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }


    public function store(Request $request) {
        $this->validate($request, [
            'name'                  => 'required|min:2',
            'email'                 => 'required|unique:tb_users,email,'.$request->id.',id,deleted_at,NULL',
            'password'              => 'min:8|confirmed', /*ya no sera requerida, debido a que puede ser null*/
            'password_confirmation' => 'required|min:8',

        ], [
            'name.required'                  => 'El Nombre es requerido',
            'name.min'                       => 'El Nombre no puede tener menos de 2 caracteres',
            'email.unique'                   => 'Este Email ya se encuentra en uso',
            'email.email'                    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'email.required'                 => 'El Email es requerido',
            'password.min'                   => 'La contraseña debe de tener minimo 8 caracteres',
            'password_confirmation.required' => 'Este campo es requerido',
            'password.confirmed'             => 'Las contraseña no coinciden vuelva a intentar',

        ]);

        DB::beginTransaction();

        try {

            $usuario = new User($request->all());

            if ($request->fk_statusUser == 'undefine' || is_null($request->fk_statusUser) || $request->fk_statusUser == '' || $request->fk_statusUser = "") {
                $usuario->fk_statusUser = 1;
            }
            $usuario->password = bcrypt($request->password);
            $usuario->save();
            $response = [
                'msj'  => 'Usuario Creado Exitosamente',
                'user' => $usuario,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

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
        try {

            $user = User::with('statusUser')->findOrFail($id);

            $response = [
                'msj'  => 'Info del Usuario',
                'user' => $user,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
            ], 500);
        }
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

        DB::beginTransaction();

        try {
            $user = User::findOrFail($id);

            $pass_last = $user->password;
            $user->fill($request->all());

            if ($request->password != null && ! empty($request->password)) {
                $user->password = bcrypt($request->password);
            } else {
                $user->password = $pass_last;
            }

            $response = [
                // 'msj'         => 'Info del Usuario actulizada',
                'user' => $user,
            ];

            $user->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($id) {

        DB::beginTransaction();

        try {
            $user = User::find($id);

            if (is_null($user)) {

                $response = [
                    'msj' => 'Usuario No existe',
                ];

                return response()->json($response, 401);
            }

            $user->delete();
            $response = [
                'msj'  => 'Usuario eliminado Correctamente',
                'user' => $user,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }


    public function setClave(Request $request) {

        $this->validate($request, [
            'password' => 'required|min:6',
        ], [
            'password.required' => 'Este campo es requerido',
            'password.min'      => 'La contraseña debe de tener minimo 6 caracteres',
        ]);

        DB::beginTransaction();

        try {

            $user_id = Auth::user()->id;

            $user = User::findOrFail($user_id);

            $pass_last = $user->password;
            //return response()->json($pass_last);

            if ($request->password != null && ! empty($request->password)) {
                $user->password = bcrypt($request->password);
            } else {
                $user->password = $pass_last;
            }

            $user->save();
            DB::commit();

            $response = [
                'msj'  => 'Clave cambiada correctamente',
                'user' => $user,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }


    public function reestablecerClave(Request $request) {

        $this->validate($request, [
            'email' => 'required',
        ], [
            'email.required' => 'El Email es requerido',
        ]);

        $user = User::where('email', $request->email)->first();

        if (is_null($user)) {

            $response = [
                'msj' => 'Verifica tu correo en la bandeja de entrada sino lo visualizas también lo puedes encontrar en el spam',
            ];

            return response()->json($response, 200);
        } else {
            $clave_nueva    = str_random(8);
            $user->password = bcrypt($clave_nueva);
            $user->save();

            Mail::to($user->email)->send(new Prueba($user, $clave_nueva));
            $response = [
                'msj'       => 'Verifica tu correo en la bandeja de entrada sino lo visualizas también lo puedes encontrar en el spam',
                'user'      => $user,
                'clave_new' => $clave_nueva,
            ];

            return response()->json($response, 200);
        }
    }

}
