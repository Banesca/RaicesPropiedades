<?php

namespace App\Http\Controllers;

use App\CarritoCompra;
use App\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CarritoCompraController extends Controller {

    public function añadir(Request $request) {

        $this->validate($request, [
            'descripcion'   => 'required',

            'cantidad'      => 'required',
           //'total'         => 'required',
            'fk_idProducto' => 'required',
        ], [
            'descripcion.required'   => 'La Descripcion es requerida',
            //'precio.required'        => 'El precio es requerido',
            'cantidad.required'      => 'La cantidad es requerida',
            //'total.required'         => 'El total es requerido',
            'fk_idProducto.required' => 'El producdo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $producto=Producto::find($request->fk_idProducto);

            if($producto){
                //$precio=$producto->precio

                $carrito = new CarritoCompra($request->all());

                $carrito->fk_idUser = Auth::user()->id;

                $carrito->save();
                $response = [
                    'msj' => 'Producto añadido al carrito',
                ];

                DB::commit();

                return response()->json($response, 201);
            }else{
                $response = [
                    'msj' => 'Producto no existe',
                ];
                return response()->json($response, 404);
            }
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en CarritoCompraController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function editarCantidad(Request $request, $idCarrito) {

        $this->validate($request, [
            'cantidad' => 'required',
        ], [
            'cantidad.required' => 'La cantidad es requerida',
        ]);

        DB::beginTransaction();

        try {
            $carrito = CarritoCompra::findOrFail($idCarrito);
            $carrito->fill([ 'cantidad' => $request->cantidad ]);

            $response = [
                'msj'     => 'Cantidad actulizada',
            ];

            $carrito->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en CarritoCompraController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function eliminar($idCarrito) {

        DB::beginTransaction();
        try {
            $carrito = CarritoCompra::findOrFail($idCarrito);
            $carrito->delete();

            $response = [
                'msj'  => 'eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en CarritoCompraController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }

    }

    public function obtenerCarritoPorUser(Request $request, $idUser) {

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

            $carrito = CarritoCompra::offset($request->offset)
                ->limit($request->limit)
                ->where('fk_idUser',$idUser)
                ->get();

        } else {

            $carrito = CarritoCompra::where('fk_idUser',$idUser)->get();
        }

        $carrito->each(function($carrito) {
            $carrito->productos;

            return $carrito;
        });

        $response = [
            'msj'   => 'Lista del carrito',
            'users' => $carrito,
        ];

        return response()->json($response, 202);


    }
}
