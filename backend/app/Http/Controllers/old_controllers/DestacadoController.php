<?php

namespace App\Http\Controllers;

use App\Destacado;
use App\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use function Psy\debug;

class DestacadoController extends Controller {
    public function crearDestacado(Request $request) {

        $this->validate($request, [
            'descripcion'   => 'required',
            'fk_idProducto' => 'required',
        ], [
            'descripcion.required'   => 'La descripcion es requerido',
            'fk_idProducto.required' => 'El Producto es requerido',
        ]);

        $producto_min = Producto::min('idProducto');
        $producto_max = Producto::max('idProducto');

        if ($request->fk_idProducto > $producto_max || $request->fk_idProducto < $producto_min) {
            $response = [
                'msj' => 'El Producto que intenta asignar No existe',
            ];

            return response()->json($response, 404);
        } else {

            DB::beginTransaction();

            try {

                if (! is_null($request->orden)) {

                    $d = Destacado::where('orden', $request->orden)->get();

                    if (count($d) > 0) {
                        $response = [
                            'msj' => 'El orden ya se encuentra en la lista, y no se pueden repetir',
                        ];

                        return response()->json($response, 403);
                    }
                }

                $destacado = new Destacado($request->all());

                $destacado->save();
                $destacado->producto;

                $response = [
                    'msj'       => 'Destacado Creado',
                    'destacado' => $destacado,
                ];
                DB::commit();

                return response()->json($response, 201);
            } catch (\Exception $e) {

                DB::rollback();
                Log::error('Ha ocurrido un error en DestacadoController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }
    }

    public function editarDestacado(Request $request, $idDestacado) {

        DB::beginTransaction();
        if (is_null($request->all())) {

            $response = [
                'msj' => 'Debe pasar algun parámetro que desee actualizar',
            ];

            return response()->json($response, 404);
        } else {
            try {

                if (! is_null($request->orden)) {

                    $d = Destacado::where('orden', $request->orden)->get();

                    if (count($d) > 0 && $d[0]->id_Destacado!=$idDestacado) {
                        $response = [
                            'msj' => 'El orden ya se encuentra en la lista, y no se pueden repetir',
                        ];

                        return response()->json($response, 403);
                    }
                }
                $destacado = Destacado::findOrFail($idDestacado);

                if (is_null($request->fk_idProducto)) {
                } else {

                    $producto_min = Producto::min('idProducto');
                    $producto_max = Producto::max('idProducto');

                    if ($request->fk_idProducto > $producto_max || $request->fk_idProducto < $producto_min) {
                        $response = [
                            'msj' => 'El Producto que intenta asignar No existe',
                        ];

                        return response()->json($response, 404);
                    } else {
                        $destacado->fill([ 'fk_idProducto' => $request->fk_idProducto ,'orden'=>$request->orden]);
                    }
                }

                $destacado->fill([ 'descripcion' => $request->descripcion ]);

                $response = [
                    'msj'       => 'Info actulizada',
                    'destacado' => $destacado,
                ];

                $destacado->save();
                DB::commit();

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en DestacadoController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }
    }

    public function eliminarDestacado($idDestacado) {

        DB::beginTransaction();

        try {
            if (is_null($idDestacado)) {
            } else {

                $producto_min = Producto::min('idProducto');
                $producto_max = Producto::max('idProducto');

                if ($idDestacado > $producto_max || $idDestacado < $producto_min) {
                    $response = [
                        'msj' => 'El Producto que intenta eliminar No existe',
                    ];

                    return response()->json($response, 404);
                } else {

                    $destacado = Destacado::findOrFail($idDestacado);
                    $destacado->delete();

                }
            }

            $response = [
                'msj'                 => 'Destacado eliminado Correctamente',
                'destacado_eliminado' => $destacado,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en DestacadoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar() {

        $destacados = Destacado::whereNotNull('orden')->orderBy('orden', 'ASC')->get();
        $destacados->each(function($destacados) {
            $destacados->producto;
            $destacados->nameProducto = $destacados->producto->nombre;

            return $destacados;
        });

        $de=array();
        foreach ($destacados as $key=>$destacado) {
            array_push($de,$destacado);
        }

        $destacados = Destacado::whereNull('orden')->orderBy('orden', 'ASC')->get();
        $destacados->each(function($destacados) {
            $destacados->producto;
            $destacados->nameProducto = $destacados->producto->nombre;

            return $destacados;
        });

        foreach ($destacados as $key=>$destacado) {
            array_push($de,$destacado);
        }


        $response = [
            'msj'        => 'Lista de destacados',
            'destacados' => $de,
        ];

        return response()->json($response, 200);
    }
}
