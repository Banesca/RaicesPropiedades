<?php

namespace App\Http\Controllers;

use App\ConfigFooter;

// use App\Mail\EnviarTokenMail;
// use App\Mail\Prueba;
// use App\Perfil;
// use App\PerfilCliente;
// use App\Suscripcion;
use App\Mail\ConfirmTasacion;
use App\Transacciones;
use App\TipoPropiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

use Image;

class TransaccionesController extends Controller {

    /*Creado por Breiddy Monterrey*/
    public function store(Request $request) {
        
            
        $this->validate($request, [
            'nombre_apellido'  => 'required|min:2',
            'telefono'         => 'required|min:2',
            'fk_tipoPropiedad' => 'required|min:1',
            'titulo'           => 'required|min:2',
            'email'            => 'required|email|min:2',
            'imagen_1'         => 'required',//image|required|mimes:jpeg,png,jpg,gif,svg
            'imagen_2'         => 'required',
        ], [
            'nombre_apellido.required'  => 'El nombre es requerido',
            'nombre_apellido.min'       => 'El Nombre no puede tener menos de 2 caracteres',
            'telefono.required'         => 'El número teléfono es requerido',
            'telefono.min'              => 'El número de teléfono no puede tener menos de 2 caracteres',
            'fk_tipoPropiedad.required' => 'La categoría es requerida',
            'fk_tipoPropiedad.min'      => 'La categoría no puede tener menos de 2 caracteres',
            'titulo.required'           => 'El título es requerido',
            'titulo.min'                => 'El título no puede tener menos de 2 caracteres',
            'email.required'            => 'El correo es  requerido',
            'email.min'                 => 'El correo no puede tener menos de 2 caracteres',
            'imagen_1.required'         => 'La Imagen es requerida',
            // 'imagen_1.mimes'            => 'Solo jpeg,png,jpg,gif,svg son soportados',
            'imagen_2.required'         => 'La Imagen es requerida',
            // 'imagen_2.mimes'            => 'Solo jpeg,png,jpg,gif,svg son soportados',
            ]);
            try {
                
                

            $transaccion = new Transacciones($request->all());
            $save_path='/uploads/tasaciones/';
            if (!file_exists(public_path($save_path))) {
                mkdir(public_path($save_path), 666, true);
            }

            if (is_null($request->imagen_1)) {
            } else {
                $image = $request->imagen_1;
                $imageInfo = explode(";base64,", $image);
                $imgExt = str_replace('data:image/', '', $imageInfo[0]);      
                $image = str_replace(' ', '+', $imageInfo[1]);
                $imageName = time().".".$imgExt;
                Storage::disk('local')->put('\\imagenTasaciones\\'.$imageName, base64_decode($image));
                $transaccion->imagen_1 = $imageName;
            }
            if (is_null($request->imagen_2)) {
            } else {
                $image = $request->imagen_2;
                $imageInfo = explode(";base64,", $image);
                $imgExt = str_replace('data:image/', '', $imageInfo[0]);      
                $image = str_replace(' ', '+', $imageInfo[1]);
                $imageName = (time()+1).".".$imgExt;
                Storage::disk('local')->put('\\imagenTasaciones\\'.$imageName, base64_decode($image));
                $transaccion->imagen_2 = $imageName;
            }
            
            $transaccion->save();

            $transaccion->tipoPropiedad;
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
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }


    public function listaCategorias() {

        $categoria = TipoPropiedad::all();
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
    public function confirmarTransaccion($idTransaccion) {
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

}
