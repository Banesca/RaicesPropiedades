<?php

namespace App\Http\Controllers;

use App\ConfigFooter;

// use App\Mail\EnviarTokenMail;
// use App\Mail\Prueba;
// use App\Perfil;
// use App\PerfilCliente;
// use App\Suscripcion;
use App\Mail\ConfirmTasacion;
use App\Mail\TasalacionMail;
use App\TipoTasacion;
use App\Transacciones;
use App\TipoPropiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Image;
use function response;

class TransaccionesController extends Controller {

    /*Creado por Breiddy Monterrey*/
    public function store(Request $request) {
        $this->validate($request, [
            'nombre_apellido'  => 'required|min:2',
            'telefono'         => 'required|min:2',
            'fk_tipoPropiedad' => 'required|min:1',
            'direccion'           => 'required|min:2',
            'email'            => 'required|email|min:2',
            'imagen_1'         => 'image|mimes:jpeg,png,jpg,gif,svg',
            'imagen_2'         => 'image|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'nombre_apellido.required'  => 'El nombre es requerido',
            'nombre_apellido.min'       => 'El Nombre no puede tener menos de 2 caracteres',
            'telefono.required'         => 'El número teléfono es requerido',
            'telefono.min'              => 'El número de teléfono no puede tener menos de 2 caracteres',
            'fk_tipoPropiedad.required' => 'La categoría es requerida',
            'fk_tipoPropiedad.min'      => 'La categoría no puede tener menos de 2 caracteres',
            'direccion.required'        => 'La dirección es requerido',
            'direccion.min'             => 'La dirección no puede tener menos de 2 caracteres',
            'email.required'            => 'El correo es  requerido',
            'email.min'                 => 'El correo no puede tener menos de 2 caracteres',
            'imagen_1.mimes'            => 'Solo jpeg,png,jpg,gif,svg son soportados',
            'imagen_2.mimes'            => 'Solo jpeg,png,jpg,gif,svg son soportados',
            ]);
            try {
                
                $transaccion = new Transacciones($request->all());
                if (is_null($request->imagen_1)) {
                } else {

                    $originalImage=$request->imagen_1;
                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $thumbnailImage = Image::make($originalImage);
                    
                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\imagenTasaciones\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $transaccion->imagen_1 = $nombre_interno;
                }

                if (is_null($request->imagen_2)) {
                } else {
                    
                    $originalImage = $request->imagen_2;
                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $thumbnailImage = Image::make($originalImage);                    

                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\imagenTasaciones\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $transaccion->imagen_2 = $nombre_interno;
                }
            $transaccion->save();

            $transaccion->tipoPropiedad;

            Mail::to($request->email)->send(new TasalacionMail($transaccion));
            DB::commit();

            $response = [
                'msj'  => 'Transacción Creada Exitosamente',
                'data' => $transaccion,
                'imagen_1' => @asset('storage\\imagenTasaciones\\'.$transaccion->imagen_1),
                'imagen_2' => @asset('storage\\imagenTasaciones\\'.$transaccion->imagen_2),
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en TransaccionesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.'
            ], 500);
        }

    }


    public function listaCategorias() {
        //$categoria = TipoPropiedad::all();
        $categoria = TipoTasacion::all();
        $response  = [
            'msj'  => 'Categorias',
            'data' => $categoria,
        ];

        return response()->json($response, 200);

    }

    public function listaTransacciones() {

        $Transaccion = Transacciones::all();
        foreach ($Transaccion as $Transacciones) {
            $Transacciones->tipoPropiedad;
            if (!is_null($Transacciones->imagen_1)) {
                $Transacciones->imagen_1=url('storage/imagenTasaciones/'.$Transacciones->imagen_1);
            }
            if (!is_null($Transacciones->imagen_2)) {
                $Transacciones->imagen_2=url('storage/imagenTasaciones/'.$Transacciones->imagen_2);
            }
        }

        $response = [
            'msj'  => 'Transacciones',
            'data' => $Transaccion,
        ];

        return response()->json($response, 200);

    }

    public function update(Request $request, $idTransaccion) {
        DB::beginTransaction();
        try {

            $Transaccion = Transacciones::findOrFail($idTransaccion);
            $Transaccion->fill($request->all());

            $Transaccion->save();
            $Transaccion->tipoPropiedad;
            $response = [
                'msj'  => 'Transacción actualizada exitosamente',
                'data' => $Transaccion,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en GaleriaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idTransaccion) {

        DB::beginTransaction();

        try {
            $Transaccion = Transacciones::find($idTransaccion);

            if (is_null($Transaccion)) {

                $response = [
                    'message' => 'Galeria no existe',
                ];

                return response()->json($response, 401);
            }

            if (!is_null($Transaccion->imagen_1)) {
                Storage::delete('\\imagenTasaciones\\'.$Transaccion->imagen_1);
            }
            if (!is_null($Transaccion->imagen_2)) {
                Storage::delete('\\imagenTasaciones\\'.$Transaccion->imagen_2);
            }

            $Transaccion->delete();
            
            $response = [
                'message' => 'Galeria eliminada correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en SucursalController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listarTransaccionesPorId($idTransaccion) {

        $Transaccion = Transacciones::find($idTransaccion);
        $Transaccion->tipoPropiedad;
        if ($Transaccion == null) {

            $response = [
                'message' => 'No existe la transacción',
            ];


        } else {
            $response = [
                'msj'  => 'transacción',
                'data' => $Transaccion,
            ];
        }

        return response()->json($response, 200);

    }

    public function changeStatusTransaccion($idTransaccion) {
        $Transaccion = Transacciones::find($idTransaccion);
        
        if ($Transaccion == null) {
            $response = [
                'message' => 'No existe la transacción',
            ];
        } else {
            $Transaccion->status="confirmada";
                    Mail::to($Transaccion->email)->send(new ConfirmTasacion($Transaccion));
            $Transaccion->update();
            $response = [
                'msj'  => 'transacción',
                'data' => $Transaccion,
            ];
        }

        return response()->json($response, 200);
    }

    public function listTransaccionBorradas() {
        $response = [
            'msj' => 'No hay Tasacción borradas',
        ];

        return response()->json(count($p = Transacciones::onlyTrashed()->get()) > 0 ? $p : $response);
    }

    public function recuperarTransaccionBorra($idTransacciones) {
        ! is_null($a = @Transacciones::onlyTrashed()->find($idTransacciones)) //primero busco si esta la Transaccion como eliminada
            ?
            $a->restore() && $p = $this->printerr('Recuperada exitosamente') //si está, entonces la recupero y construyo el mensaje
            :
            $p = $this->printerr('No existe como eliminada'); //si no, construyo el mensaje de error

        return $p;
    }

    public function printerr($msj) {
        $response = [
            'msj' => 'Propiedad '.$msj,
        ];

        return $response;
    }
    public function filter(Request $request) {
        $busqueda = "%" . $request->filter . "%";

        $resultadoUnico = Transacciones::
        where(function ($query) use ($busqueda) {
            $query->where('nombre_apellido', 'like', $busqueda);
            $query->orwhere('telefono', 'like', $busqueda);
            $query->orwhere('direccion', 'like', $busqueda);
            $query->orwhere('descripcion', 'like', $busqueda);
            $query->orwhere('email', 'like', $busqueda);
        })->get();


        /*$response = [
            'msj'  => 'Transacciones',
            'data' => $resultadoUnico,
        ];*/
        return response()->json($resultadoUnico);

    }

}
