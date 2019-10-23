<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SucursalController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'nombreSucursal'    => 'required|unique:tb_sucursals,nombreSucursal,'.$request->idSucursal.',idSucursal,deleted_at,NULL',
            'telefonoSucursal'  => 'required',
            'emailSucursal'     => 'required|email',
            'direccionSucursal' => 'required',
        ], [
            'nombreSucursal.required'    => 'EL nombre de la Sucursal es requerido',
            'nombreSucursal.unique'      => 'Esta Sucursal ya se encuentra en uso',
            'telefonoSucursal.unique'    => 'Este Email ya se encuentra en uso',
            'emailSucursal.required'     => 'La url es requerida',
            'emailSucursal.email'        => 'El Email debe de tener un formato ejemplo@ejemplo.com',
            'direccionSucursal.required' => 'El icon es requerido',

        ]);

        DB::beginTransaction();

        try {

            $sucursal = new Sucursal($request->all());

            $sucursal->save();
            $response = [
                'msj'  => 'Sucursal creada exitosamente',
                'sucursal' => $sucursal,
            ];
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en SucursalController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function update(Request $request, $idSucursal) {

        DB::beginTransaction();

        try {
            $sucursal = Sucursal::findOrFail($idSucursal);
            $sucursal->fill($request->all());

            $sucursal->save();
            DB::commit();

            $response = [
                'msj'      => 'Sucursal actualizada exitosamente',
                'sucursal' => $sucursal,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en SucursalController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idSucursal) {

        DB::beginTransaction();

        try {
            $sucursal = Sucursal::find($idSucursal);

            if (is_null($sucursal)) {

                $response = [
                    'msj' => 'Sucursal no existe',
                ];

                return response()->json($response, 401);
            }

            $sucursal->delete();
            $response = [
                'msj'  => 'Sucursal eliminado correctamente',
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

            $sucursals = Sucursal::offset($request->offset)->limit($request->limit)->get();
        } else {
            $sucursals = Sucursal::get();
        }

        $response = [
            'msj'        => 'Lista de Sucursales',
            'suculsales' => $sucursals,
        ];

        return response()->json($response, 200);
    }

    public function listarPorId($id) {


        $sucursals = Sucursal::find($id);


        $response = [
            'msj'        => 'Sucursal',
            'suculsales' => $sucursals,
        ];

        return response()->json($response, 200);
    }
    public function filter(Request $request) {

            $busqueda = "%" . $request->search . "%";

            $resultadoUnico = Sucursal::
                where(function ($query)
                use (
                    $busqueda
                ) {
                    $query->orwhere('nombreSucursal', 'like', $busqueda);
                    $query->orwhere('telefonoSucursal', 'like', $busqueda);
                    $query->orwhere('emailSucursal', 'like', $busqueda);
                    $query->orwhere('direccionSucursal', 'like', $busqueda);
                })
                ->get();


        return response()->json(['request'=>$resultadoUnico]);
    }
}
