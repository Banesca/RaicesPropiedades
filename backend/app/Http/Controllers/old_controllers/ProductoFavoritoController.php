<?php

namespace App\Http\Controllers;

use App\ProductoFavorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductoFavoritoController extends Controller {

    /**
     * Almacena un producto favorito de un cliente
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $this->validate($request, [
            'id_perfilCliente' => 'required',
            'idProducto'       => 'required',
        ], [
            'id_perfilCliente.required' => 'El id del perfil de cliente es requerido',
            'idProducto.required'       => 'El id del producto es requerido',
        ]);

        DB::beginTransaction();

        $p = ProductoFavorito::where('fk_idPerfilCliente', $request->id_perfilCliente)
            ->where('fk_idProducto',$request->idProducto)
            ->get();


        if (count($p) >= 1) {
            $response = [
                'msj' => 'El cliente ya tiene este producto en su lista de favoritos',
            ];
            return response()->json($response, 401);
        }


        try {

            $productoFavorito = new ProductoFavorito($request->all());
            $productoFavorito->fk_idPerfilCliente = $request->id_perfilCliente;
            $productoFavorito->fk_idProducto = $request->idProducto;

            $productoFavorito->save();
            $productoFavorito->producto;

            $response = [
                'msj'              => 'Producto Favorito agregado exitosamente',
                'productoFavorito' => $productoFavorito,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoFavoritoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Elimina un producto favorito de un cliente
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request) {
        $this->validate($request, [
            'idProductoFavorito' => 'required',
        ], [
            'idProductoFavorito.required' => 'El id del producto es requerido',
        ]);

        DB::beginTransaction();

        try {

            $productoFavorito = ProductoFavorito::findOrFail($request->idProductoFavorito);

            $productoFavorito->delete();

            $response = [
                'msj'              => 'Producto Favorito eliminado exitosamente',
                'productoFavorito' => $productoFavorito,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoFavoritoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    /**
     * Lista los productos de un cliente.
     *
     * @param  $idPerfilCliente
     * @return \Illuminate\Http\Response
     */
    public function listar($idPerfilCliente) {
        DB::beginTransaction();

        try {

            $productosFavoritos = ProductoFavorito::with('producto')->where('fk_idPerfilCliente', $idPerfilCliente)->get();

            $response = [
                'msj'                => 'Lista de Productos Favoritos',
                'productosFavoritos' => $productosFavoritos,
            ];

            DB::commit();

            return response()->json($response, 201);

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoFavoritoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de consultar los datos.',
            ], 500);
        }
    }
}
