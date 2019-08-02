<?php

namespace App\Http\Controllers;

use App\Ficha1;
use App\Ficha123;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Ficha1Controller extends Controller
{
    public function add(Request $request)
    {
        $this->validate($request, [
            'descipcion'             => 'required',
            'fk_tipoPropiedad'       => 'required',
            'esUnaPropiedad'         => 'required',
            'esUnaNovedad'           => 'required',
            'esUnaOportunidad'       => 'required',
            'apareceEnGaleriaInicia' => 'required',
            'fk_estado_publicacion'  => 'required',
            'fk_idTipoOperaion'      => 'required',
            'precio'                 => 'required',
            'fk_idMonedas'           => 'required',
            'comision'               => 'required',
            'titulo'                 => 'required',
            'tipo_publicacion'       => 'required',
            'aparece_en_galeria'     => 'required',
        ], [
            'descipcion.required'             => 'El Campo es requerido',
            'fk_tipoPropiedad.required'       => 'El Campo es requerido',
            'esUnaPropiedad.required'         => 'El Campo es requerido',
            'esUnaNovedad.required'           => 'El Campo es requerido',
            'esUnaOportunidad.required'       => 'El Campo es requerido',
            'apareceEnGaleriaInicia.required' => 'El Campo es requerido',
            'fk_estado_publicacion.required'  => 'El Campo es requerido',
            'fk_idTipoOperaion.required'      => 'El Campo es requerido',
            'precio.required'                 => 'El Campo es requerido',
            'fk_idMonedas.required'           => 'El Campo es requerido',
            'comision.required'               => 'El Campo es requerido',
            'titulo.required'                 => 'El Campo es requerido',
            'tipo_publicacion.required'       => 'El Campo es requerido',
            'aparece_en_galeria.required'     => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $ficha1 = new Ficha1($request->all());
            $ficha1->save();

            $ficha1->estadoPublicacion;
            $ficha1->tipoPropiedad;

            $response = [
                'msj'    => 'Ficha 1 creada Exitosamente',
                'ficha1' => $ficha1,
            ];
            DB::commit();

            $ficha123 = new Ficha123(['fk_idFicha1' => $ficha1->idFicha1]);
            $ficha123->save();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en Ficha1Controller: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }
}
