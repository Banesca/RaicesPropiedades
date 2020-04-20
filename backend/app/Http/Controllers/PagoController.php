<?php

namespace App\Http\Controllers;

use App\ConfigGeneral;
use App\Mail\PagoMail;
use App\Mail_;
use App\Pago;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Image;

class PagoController extends Controller {
    public function store(Request $request) {
        $this->validate($request, [
            'n_transferencia_deposito' => 'required|unique:tb_pagos,n_transferencia_deposito,'.$request->idPago.',idPago,deleted_at,NULL',
            'nombre'                   => 'required',
            //'apellido'                 => 'required',
            'detalle'                  => 'required',
            'dir_adjunto'              => 'required',
        ], [
            'n_transferencia_deposito.required' => 'El campo es requerido',
            'n_transferencia_deposito.unique'   => 'Este número de referencia ya existe por favor verifique',
            'nombre.required'                   => 'El campo es requerido',
            //'apellido.required'                 => 'El campo es requerido',
            'detalle.required'                  => 'El campo es requerido',
            'dir_adjunto.required'              => 'El campo es requerido',

        ]);

        DB::beginTransaction();

        try {

            $pago = new Pago($request->all());

            if ($request->exists('dir_adjunto')) {
                $originalImage = $request->dir_adjunto;

                $thumbnailImage = Image::make($originalImage);

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\pagos\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $pago->dir_adjunto = $nombre_interno;
            }

            $pago->save();
            $pago->urlImagen = asset('storage\\pagos\\'.@$pago->dir_adjunto);
            $response        = [
                'msj'  => 'Pago registrado exitosamente',
                'pago' => $pago,
            ];
            DB::commit();

            $mail = ConfigGeneral::first();

            $mail = $mail->correo;

            /*Copia a Emails de Recepción*/
            $cc = Mail_::pluck('email');

            if ($mail) {
                Mail::to($mail)
                    ->cc($cc)
                    ->send(new PagoMail($pago));
            }else{
                Mail::to($cc[0])
                    ->cc($cc)
                    ->send(new PagoMail($pago));
            }

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PagoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function update(Request $request, $idpago) {

        DB::beginTransaction();

        try {
            $pago = Pago::findOrFail($idpago);
            $pago->fill($request->all());

            if ($request->exists('dir_adjunto')) {
                $originalImage = $request->dir_adjunto;

                $thumbnailImage = Image::make($originalImage);

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\pagos\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $pago->dir_adjunto = $nombre_interno;
            }

            $pago->save();
            $pago->urlImagen = asset('storage\\pagos\\'.@$pago->dir_adjunto);
            DB::commit();

            $response = [
                'msj'  => 'Pago actualizada exitosamente',
                'pago' => $pago,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en PagoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idpago) {

        DB::beginTransaction();

        try {
            $pago = Pago::find($idpago);

            if (is_null($pago)) {

                $response = [
                    'msj' => 'Pago no existe',
                ];

                return response()->json($response, 401);
            }

            $pago->delete();
            $response = [
                'msj' => 'Pago eliminado correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en PagoController: '.$e->getMessage().', Linea: '.$e->getLine());

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

            $pagos = Pago::offset($request->offset)->limit($request->limit)->get();
        } else {
            $pagos = Pago::get();
        }

        $pagos->each(function($pagos) {
            $pagos->urlImagen = asset('storage\\pagos\\'.$pagos->imagen);
        });

        $response = [
            'msj'   => 'Lista de Pagos',
            'pagos' => $pagos,
        ];

        return response()->json($response, 200);
    }

    public function listarPorId($id) {

        $pago            = Pago::find($id);
        $pago->urlImagen = asset('storage\\pagos\\'.@$pago->dir_adjunto);
        $response        = [
            'msj'  => 'Pago',
            'pago' => $pago,
        ];

        return response()->json($response, 200);
    }

    public function filter(Request $request) {

        $busqueda = "%".$request->search."%";

        $resultadoUnico = Pago::where(function($query)
        use ($busqueda) {
            $query->orwhere('nombrepago', 'like', $busqueda);
            $query->orwhere('telefonopago', 'like', $busqueda);
            $query->orwhere('emailpago', 'like', $busqueda);
            $query->orwhere('direccionpago', 'like', $busqueda);
        })->get();

        return response()->json([ 'request' => $resultadoUnico ]);
    }
}
