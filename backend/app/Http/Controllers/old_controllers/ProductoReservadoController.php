<?php

namespace App\Http\Controllers;

use App\Mail\NotificacionCreacionProductoReservado;
use App\Producto;
use App\ProductoReservado;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class ProductoReservadoController extends Controller
{
    public function agregar(Request $request)
    {
        $this->validate($request, [
            'fk_idProducto' => 'required',
            'fk_idUser'     => 'required',
        ], [
            'fk_idProducto.required' => 'El producto es requerido',
            'fk_idUser.required'     => 'El usuario es requerido',
        ]);

        $use=User::find($request->fk_idUser);
        if(is_null($use)){
            $response = [
                'msj' => 'No existe el user que intenta agregar',
            ];
            return response()->json($response, 404);
        }

        $pro=Producto::find($request->fk_idProducto);
        if(is_null($pro)){
            $response = [
                'msj' => 'No existe el producto que intenta agregar',
            ];
            return response()->json($response, 404);
        }

        DB::beginTransaction();

        try {

            $rs = new ProductoReservado($request->all());
            $rs->status="A la espera de disponibilidad";
            $rs->save();
            $rs->user;
            $rs->producto;

            DB::commit();

            $response = [
                'msj' => 'Producto reservado ',
                'pr'  => $rs,
            ];

            $user = User::where('id', $request->fk_idUser)->first();

            Mail::to($user->email)->send(new NotificacionCreacionProductoReservado());

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoReservadoController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }
}
