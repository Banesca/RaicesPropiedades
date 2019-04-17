<?php

namespace App\Http\Controllers;

use App\orderHeader;
use App\StateOrder;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;
use PDF;

class OrderHeaderController extends Controller {


    public function pdf($idOrderHeader=false)
    {
        $data=orderHeader::with('user','state','orderBody','orderBody.producto')->where('idOrderHeader',$idOrderHeader)->get();
        if($idOrderHeader==false || count($data)<=0){
            $response = [
                'msj'   => 'Debe pasar algun id de la órden valido',
            ];

            return response()->json($response, 404);
        }

        $pdf = PDF::loadView('pedidos', ['pedido'=>$data[0]]);
        return $pdf->download('a.pdf');
    }

    public function cambiarStatusOrder(Request $request) {

//recibe numeroPedido y fk_idStateOrder

        $statusOrden_min = StateOrder::min('idStateOrder');
        $statusOrden_max = StateOrder::max('idStateOrder');

        $this->validate($request, [
            'numeroPedido'    => 'required',
            'fk_idStateOrder' => 'required|integer',
        ], [
            'numeroPedido.required'    => 'El campo es requerido',
            'fk_idStateOrder.required' => 'El campo es requerido',
            'fk_idStateOrder.integer'  => 'El campo debe ser numerio',
        ]);

        $order = orderHeader::where('Numero_Pedido', $request->numeroPedido)->first();

        if (! is_null($order)) {

            if ($request->fk_idStateOrder > $statusOrden_max || $request->fk_idStateOrder < $statusOrden_min) {
                $response = [
                    'msj'               => 'El Estatus que intenta asignar No existe',
                    'statusDisponibles' => StateOrder::pluck('StateOrder', 'idStateOrder'),
                ];

                return response()->json($response, 404);

            } else {

                $order->fk_idStateOrder = $request->fk_idStateOrder;
                $order->save();
                $order->state;

                $response = [
                    'msj'   => 'Estatus de la Orden Cambiado',
                    'order' => $order,
                ];

                return response()->json($response, 200);

            }
        } else {
            $response = [
                'msj' => 'Hay un problema, tal vez la orden no exista, por favor verifique',
            ];

            return response()->json($response, 404);
        }

    }

    public function añadir(Request $request) {
        // opcional comentaryClient

        $this->validate($request, [
            //'Domicilio_Entrega' => 'required',
            //'Codigo_Postal' => 'required',
            //'monto_total'       => 'required',
            //'comentarioFinal'   => 'required',
            'metodoEntrega' => 'required',
            //'disponibilidadHr'                 => 'required',
            /*'CUIT'                             => 'required',
            'CUITrazonSocial'                  => 'required',
            'CUITDomicilioFidcal'              => 'required',
            'metodoPago'                       => 'required',
            'comprobanteDepositoTransferencia' => 'required',*/
            //'fk_idTipoFactura'                 => 'required',
            //'localidad'                        => 'required',

        ], [
            //'Domicilio_Entrega.required' => 'El campo es requerido',
            //'Codigo_Postal.required' => 'El campo es requerido',
            //'monto_total.required'       => 'El campo es requerido',
            //'comentarioFinal.required'   => 'El campo es requerido',
            'metodoEntrega.required' => 'El campo es requerido',
            //'disponibilidadHr.required'                 => 'El campo es requerido',
            /*'CUIT.required'                             => 'El campo es requerido',
            'CUITrazonSocial.required'                  => 'El campo es requerido',
            'CUITDomicilioFidcal.required'              => 'El campo es requerido',
            'metodoPago.required'                       => 'El campo es requerido',
            'comprobanteDepositoTransferencia.required' => 'El campo es requerido',/*
            //'fk_idTipoFactura.required'                 => 'El campo es requerido',
            //'localidad.required'                        => 'El campo es requerido',*/
        ]);

        DB::beginTransaction();

        try {


            $Numero_Pedido_max = orderHeader::select('idOrderHeader')->orderby('idOrderHeader', 'desc')->first();

            if (is_null($Numero_Pedido_max)) {
                $Numero_Pedido = '1-'.Carbon::now()->format('Ymd');
            } else {
                $Numero_Pedido = ($Numero_Pedido_max->idOrderHeader + 1).'-'.Carbon::now()->format('Ymd');
            }

            $OB = new orderHeader($request->all());

             if (isset($request->comprobanteDepositoTransferencia) && $request->comprobanteDepositoTransferencia != "null" && $request->comprobanteDepositoTransferencia!="undefined") {

                $this->validate($request, [
                    'comprobanteDepositoTransferencia' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
                ], [
                    'comprobanteDepositoTransferencia.required' => 'El campo es requerido',
                    'comprobanteDepositoTransferencia.image'    => 'La imagen debe tener el formato jpeg, pnp, gif, svg',
                ]);


                /*para el comprobante*/
                $originalImage = $request->comprobanteDepositoTransferencia;

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = 'png';
                //$extension = $originalImage->getClientOriginalExtension();
                $nombre_interno1 = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno1 = str_slug($nombre_interno1, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\comprobanteDepositoTransferencia\\'.$nombre_interno1, (string) $thumbnailImage->encode());
                /*para el comprobante*/

                $OB->comprobanteDepositoTransferencia = $nombre_interno1;
            }


            if (is_null($request->stars)) {
                $OB->stars = 0;
            }

            if (is_null($request->monto_total)) {
                $OB->monto_total = 0;
            }


            $OB->Numero_Pedido   = $Numero_Pedido;
            $OB->Estado_Pedido   = 'Abierto';
            $OB->fk_idUserClient = Auth::user()->id;
            $OB->Email_Cliente   = Auth::user()->email;
            $OB->fk_idUserDriver = 0; //esto no agarra valores nulos por lo que le asigne 0 por default

            $OB->Fecha_Pedido    = Carbon::now()->toDateString();
            $OB->fk_idStateOrder = 1;


            $OB->save();
            $OB->user;
            $OB->state;

            if (! is_null($OB->fk_idTipoFactura)) {
                $OB->tipoFactura;
            }

            OrderDriverController::addHeader($OB);

            $response = [
                'msj'        => 'Pedido Creado',
                'OB'         => $OB,
                'set_imagen' => asset('storage\\comprobanteDepositoTransferencia\\'.$OB->comprobanteDepositoTransferencia),
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en OrderHeaderController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function listarPorIdUsuario($fk_idUser) {

        $orders = orderHeader::select("*")->where('fk_idStateOrder', '=', '5')->where('fk_idUserClient', $fk_idUser)->get();

        $response = [
            'msj'    => 'Pedidos que faltan calificar por cliente ',
            'orders' => $orders,
        ];

        return response()->json($response, 200);
    }

    public function safePago(Request $request) {


        DB::beginTransaction();
        try {


            DB::connection('mysql')->insert("  INSERT INTO tb_history_mp 
            (data,
            fk_idOrderHeader) VALUES(
                 '$request->data',  
                 $request->id
              )");

            return response()->json("Registro creado", 200);

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en NotificationController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }


    }

    public function getDataPay(Request $request) {


        DB::beginTransaction();
        try {

            $obj = [
                "clienteid"     => env('MP_clienteid', ''),
                "clientesecret" => env('MP_clientesecret', ''),
                "currency_id"   => env('MP_currency_id', ''),
                "unit_price"    => $request->unit_price,
                "id"            => $request->idOrderHeader,
                "title"         => "Compra Pedido ".$request->Numero_Pedido,
                "uri"           => env('MP_URI', ''),
            ];


            return response()->json($obj, 200);

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en NotificationController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }


    }

    /**
     * Devuelve los pedidos filtrados por el estado correspondiente.
     *
     * @param $idEstado
     * @return \Illuminate\Http\Response
     */

    public function filtrarPorEstado($idEstado) {

        $estadoMin = StateOrder::min('idStateOrder');
        $estadoMax = StateOrder::max('idStateOrder');

        if ($idEstado > $estadoMax || $idEstado < $estadoMin) {
            $response = [
                'msj'                 => 'El estado por el que quiere filtrar los pedidos no existe.',
                'estados_disponibles' => StateOrder::orderBy('idStateOrder', 'ASC')->pluck('StateOrder', 'idStateOrder'),
            ];

            return response()->json($response, 404);

        } else {

            DB::beginTransaction();

            try {

                $pedidos  = orderHeader::where('fk_idStateOrder', $idEstado)->get();
                $response = [
                    'msj'     => 'Lista de Pedidos',
                    'Pedidos' => $pedidos,
                ];

                return response()->json($response, 202);

            } catch (\Exception $e) {

                DB::rollback();
                Log::error('Ha ocurrido un error en OrderHeaderController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de hacer la consulta de los datos.',
                ], 500);

            }

        }

    }

    /**
     * Devuelve los pedidos filtrados por el fecha y hora.
     *
     * @param \Illuminate\Http\Request
     * @return \Illuminate\Http\Response
     */

    public function filtrarPorFecha(Request $request) {

        $this->validate($request, [
            'fechaInicio' => 'required',
            'fechaFinal'  => 'required',
        ], [
            'fechaInicio.required' => 'La Fecha de inicio es requerida',
            'fechaFinal.required'  => 'La Fecha final es requerida',
        ]);

        $from = $request->fechaInicio;
        $to   = $request->fechaFinal;

        DB::beginTransaction();

        try {

            $pedidos  = orderHeader::whereBetween('created_at', [ $from, $to ])->get();
            $response = [
                'msj'     => 'Lista de Pedidos.',
                'Pedidos' => $pedidos,
            ];

            return response()->json($response, 202);

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en OrderHeaderController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al hacer la consultade los datos.',
            ], 500);

        }


    }

}
