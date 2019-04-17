<?php

namespace App\Http\Controllers;

use App\orderBody;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\orderHeader;
use App\Notification;
use App\User;
use Illuminate\Support\Facades\Storage;
use Image;


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class OrderDriverController extends Controller
{

    // OBTENEMOS TODOS LOS PEDIDOS POR CODIGO CHOFER 
    public function getAllByCodeDriver (Request $request)
    {

        try {
            $rs = null;

            $sql = "";
            if ($request->search != "") {
                $sql = " AND Pedido LIKE '%" . $request->search . "%' ";
            }

            // POR CHOFER
            if ($request->Codigo_Transporte != "") {
                $sql = $sql . " AND Codigo_Transporte = '" . $request->Codigo_Transporte . "' ";
            }

            // POR CLIENTE 
            if ($request->Codigo_Cliente != "") {
                $sql += $sql . " AND Codigo_Cliente = '" . $request->Codigo_Cliente . "' ";
            }

            $rs = DB::connection('sqlsrv')->select(" SELECT TOP 20 * FROM   VentasporComprobantes  
            where   (EstadoPedido = 'En Transito' 
            or EstadoPedido ='Cerrado') " . $sql . "  order by Ruta  ");

            if ($rs) {

                $result = [];
                $orders = [];

                $tempRuta = "Sin Ruta";
                $c        = 0;
                foreach ($rs as $item) {
                    if ($item->Ruta == "") {
                        $item->Ruta = "Sin Ruta";
                    }

                    // si es igual a la aterior 
                    if ((strcasecmp($item->Ruta, $tempRuta) == 0) || $c == 0) {
                        array_push($orders, $item);
                    }

                    if ((strcasecmp($item->Ruta, $tempRuta) != 0) || $c == count($rs) - 1) {
                        $data = ["Ruta" => $tempRuta, "data" => $orders];
                        array_push($result, $data);
                        $orders = [];
                    }

                    $tempRuta = $item->Ruta;

                    $c++;

                }


                return response()->json($result, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }

    }

    // OBTENEMOS  PEDIDOS ACTUALES POR CODIGO CHOFER 
    public function getByCodeDriver (Request $request)
    {

        try {
            $rs = null;

            $sql = "";
            if ($request->search != "") {
                $sql = " AND Pedido LIKE '%" . $request->search . "%' ";
            }

            // POR CHOFER
            if ($request->Codigo_Transporte != "") {
                $sql = $sql . " AND Codigo_Transporte = '" . $request->Codigo_Transporte . "' ";
            }


            $rs = DB::connection('sqlsrv')->select(" SELECT TOP 20 * FROM   VentasporComprobantes  
            where   EstadoPedido != 'Reparto' " . $sql . "  order by Ruta  ");

            if ($rs) {

                $result = [];
                $orders = [];

                $tempRuta = "Sin Ruta";
                $c        = 0;
                foreach ($rs as $item) {
                    if ($item->Ruta == "") {
                        $item->Ruta = "Sin Ruta";
                    }

                    // si es igual a la aterior 
                    if ((strcasecmp($item->Ruta, $tempRuta) == 0) || $c == 0) {
                        array_push($orders, $item);
                    }

                    if ((strcasecmp($item->Ruta, $tempRuta) != 0) || $c == count($rs) - 1) {
                        $data = ["Ruta" => $tempRuta, "data" => $orders];
                        array_push($result, $data);
                        $orders = [];
                    }

                    $tempRuta = $item->Ruta;

                    $c++;

                }


                return response()->json($result, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }

    // OBTENEMOS PRODUCTOS DE UN  PEDIDOS ACTUALES POR CODIGO PEDIDO 
    public static function getProductByPedido (Request $request)
    {

        try {
            $rs = null;
            $rs = DB::connection('sqlsrv')->select("  SELECT  *  FROM VentasporProductos
            where Pedido = " . $request->Pedido . " ");


            if ($rs) {
                return response()->json($rs, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


    // cambio esta de un pedido //
    public function chagueEstadoPedido (Request $request)
    {

        try {


            $order = orderHeader::where("Numero_Pedido", "=", $request->Numero_Pedido)->first();

            if ($order) {
                $order->Estado_Pedido   = $request->Estado_Pedido;
                $order->fk_idStateOrder = $request->fk_idStateOrder;
                $order->save();
            }

            DB::connection('sqlsrv')->update("  UPDATE EncabezadosVentas_APP
             set Estado_Pedido = '" . $request->Estado_Pedido . "' where Numero_Pedido = '" . $request->Numero_Pedido . "' ");


            // ENVIO DE NOTIFICACION A LOS CLIENTE DE FIREBASE //
            if ($order) {
                if ($order->fk_idStateOrder == 5) {
                    if ($order->fk_idUserClient > 0) {

                        $user = User::select("tokenFirebase")->findOrFail($order->fk_idUserClient);

                        $data = [
                            'descriptionNotification' => 'Confirme la recepcion de su pedido #' . $order->Numero_Pedido,
                            'idSecctionApp' => 4 // Pedidos
                        ];

                        NotificationController::sendNotificationFb('Su pedido fue entregado', $data, $user->tokenFirebase);

                        $notifications                          = new Notification();
                        $notifications->titleNotification       = 'Su pedido fue entregado';
                        $notifications->descriptionNotification = 'Confirme la recepcion de su pedido #' . $order->Numero_Pedido;
                        $notifications->fk_idSecctionApp        = 4;// Pedidos
                        $notifications->fk_idUser               = $order->fk_idUserClient;// Pedidos

                        $notifications->save();
                    }
                }
            }

            return response()->json("Pedido actualizado ", 200);

        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }


    // cambio esta de un pedido //
    public function chaguePhoneAndAdrresClinet (Request $request)
    {

        try {


            DB::connection('sqlsrv')->update("  UPDATE Clientes
             set isUpdatePhoneAndAdressApp = 1, 
             Telefonos_Cliente = '" . $request->Telefonos_Cliente . "' ,
             Domicilio_Cliente = '" . $request->Domicilio_Cliente . "' 
             where Codigo_Cliente = '" . $request->Codigo_Cliente . "' ");

            return response()->json("Datos actualizados ", 200);

        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }

    // Finalizar Pedido
    public function finishPedido (Request $request)
    {
        try {

            // CARGAMOS LA IMAGEN

            $originalImage = $request->filename;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(2048, 2048, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = 'png';//$originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.' . $extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-') . '-' . time() . '-' . strval(rand(100, 999)) . '.' . $extension;

            Storage::disk('local')->put('\\firmas\\' . $nombre_interno, (string)$thumbnailImage->encode());

            $order = orderHeader::where("Numero_Pedido", "=", $request->Numero_Pedido)->first();

            if ($order) {
                $order->Estado_Pedido   = $request->Estado_Pedido;
                $order->fk_idStateOrder = $request->fk_idStateOrder;
                $order->stars           = $request->stars;
                $order->firma2          = $nombre_interno;
                $order->comentarioFinal = $request->comentarioFinal;
                $order->save();
            }

            DB::connection('sqlsrv')->update("  UPDATE EncabezadosVentas_APP set Estado_Pedido = '" . $request->Estado_Pedido . "'
            , stars = " . $request->stars . "where Numero_Pedido = '" . $request->Numero_Pedido . "' ");


            // ENVIO DE NOTIFICACION A LOS CLIENTE DE FIREBASE //
            if ($order) {
                if ($order->fk_idStateOrder == 5) {
                    if ($order->fk_idUserClient > 0) {

                        $user = User::select("tokenFirebase")->findOrFail($order->fk_idUserClient);

                        $data = [
                            'descriptionNotification' => 'Confirme la recepcion de su pedido #' . $order->Numero_Pedido,
                            'idSecctionApp' => 4 // Pedidos
                        ];

                        NotificationController::sendNotificationFb('Su pedido fue entregado', $data, $user->tokenFirebase);

                        $notifications                          = new Notification();
                        $notifications->titleNotification       = 'Su pedido fue entregado';
                        $notifications->descriptionNotification = 'Confirme la recepcion de su pedido #' . $order->Numero_Pedido;
                        $notifications->fk_idSecctionApp        = 4;// Pedidos
                        $notifications->fk_idUser               = $order->fk_idUserClient;// Pedidos

                        $notifications->save();
                    }
                }
            }

            return response()->json("Pedido actualizado ", 200);

        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }


    // Finalizar Pedido
    public function prefinishPedido (Request $request)
    {

        try {

            // CARGAMOS LA IMAGEN

            $path_imagenes = storage_path() . '\\app\\public\\firmas\\';
            //dd($path_imagenes);

            $binary_data = base64_decode($request->filename);


            $nombre = 'firma_' . time() . random_int(1, 100) . '.jpg';

            //dd($binary_data);

            // save to server (beware of permissions)

            $result = file_put_contents($path_imagenes . $nombre, $binary_data);


            if (!$result) {

                die("No se puede guardar la foto perfil!  Check file permissions.");
            }

            /*
                        $originalImage = $request->filename;

                        $thumbnailImage = Image::make($originalImage);

                        $thumbnailImage->fit(2048, 2048, function($constraint) {
                            $constraint->aspectRatio();
                        });

                        $nombre_publico = $originalImage->getclientoriginalname();
                        $extension      = $originalImage->getClientOriginalExtension();

                        $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                        $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                        Storage::disk('local')->put('/firmas/'.$nombre_interno, (string) $thumbnailImage->encode());

                        */


            $order = orderHeader::where("Numero_Pedido", "=", $request->Numero_Pedido)->first();

            if ($order) {
                $order->Estado_Pedido   = $request->Estado_Pedido;
                $order->fk_idStateOrder = $request->fk_idStateOrder;
                $order->firma1          = $nombre;
                $order->save();
            }

            DB::connection('sqlsrv')->update("UPDATE EncabezadosVentas_APP
             set Estado_Pedido = '" . $request->Estado_Pedido . "'
              where Numero_Pedido = '" . $request->Numero_Pedido . "' ");

            return response()->json("Pedido actualizado ", 200);

        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }

    // devolucion  de un prodcto pedido //
    public function devolutionProduct (Request $request)
    {

        try {
            DB::connection('sqlsrv')->update("  UPDATE DetallesVentas_APP
             set Devolucion_Producto = '" . $request->Devolucion_Producto . "' 
             where Numero_Pedido = '" . $request->Numero_Pedido . "'
             and Codigo_Producto = '" . $request->Codigo_Producto . "'
              ");


            /*  DB::connection('sqlsrv')->update("  UPDATE DetallesVentas
              set Devolucion_Producto = '".$request->Devolucion_Producto."'
              where Numero_DetalleVenta = '".$request->Numero_Pedido."'
              and Codigo_Producto = '".$request->Codigo_Producto."'
              ");*/


            $request->Pedido = $request->Numero_Pedido;

            return response()->json($this->getProductByPedido($request)->original, 200);

        } catch (\Exception $e) {
            //  dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


    // devolucion  de un prodcto pedido //
    public function existProduct (Request $request)
    {

        try {
            DB::connection('sqlsrv')->update("  UPDATE DetallesVentas_APP
             set exist = '" . $request->exist . "' 
             where Numero_Pedido = '" . $request->Numero_Pedido . "'
             and Codigo_Producto = '" . $request->Codigo_Producto . "'
              ");

            DB::connection('sqlsrv')->update("  UPDATE DetallesVentas
            set exist = '" . $request->exist . "' 
            where Numero_DetalleVenta = '" . $request->Numero_Pedido . "'
            and Codigo_Producto = '" . $request->Codigo_Producto . "'
            ");

            $request->Pedido = $request->Numero_Pedido;

            return response()->json($this->getProductByPedido($request)->original, 200);

        } catch (\Exception $e) {
            // dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


    /*
    CREA PEDIDO
    */

    public function getEncabezadosVentas(){

        return response()->json(DB::connection('sqlsrv')->select("SELECT TOP 10 * FROM EncabezadosVentas_APP WHERE Estado_Pedido='Solicitado' ORDER BY EncabezadosVentas_APP.Numero_Pedido DESC "));
    }

    public function getDetallesVentas_APP(){

        return response()->json(DB::connection('sqlsrv')->select("SELECT TOP 10 * FROM DetallesVentas_APP WHERE Numero_Pedido='28'"));
    }

    // HEADER
    public static function addHeader (orderHeader $request)
    {
        try {
            $mytime = Carbon::now();


            $RE=DB::connection('sqlsrv')->insert("  INSERT INTO EncabezadosVentas_APP 
            (   Email_Cliente,
                Fecha_Pedido,
                Numero_Pedido,
                Estado_Pedido,
                Domicilio_Entrega,
                Codigo_Postal,
                comentaryClient) VALUES(
                 '$request->Email_Cliente',  
                 '$mytime',
                 '$request->Numero_Pedido',
                 'Solicitado',
                 '$request->Domicilio_Entrega',
                 '$request->Codigo_Postal',
                 '$request->comentaryClient'
              )");

            return response()->json("Pedido creado ", 200);

        } catch (\Exception $e) {
            //   dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }

    // BODY
    public static function addBody (Request $request, $fk_idOrderHeader)
    {
        try {
            foreach ($request->items as $item) {

                $codeProdSys                  = $item["codeProdSys"];
                $Cantidad_Producto            = $item["Cantidad_Producto"];
                $PrecioUnitario_Producto      = $item["PrecioUnitario_Producto"];
                $PorcentajeDescuento_Producto = $item["PorcentajeDescuento_Producto"];
                $Devolucion_Producto          = $item["Devolucion_Producto"];
                $Numero_Pedido                = $fk_idOrderHeader;

                $RS=DB::connection('sqlsrv')->insert("  INSERT INTO DetallesVentas_APP 
                (   Codigo_Producto,
                    Cantidad_Producto,
                    PrecioUnitario_Producto,
                    PorcentajeDescuento_Producto,
                    Devolucion_Producto,
                    Numero_Pedido
                ) VALUES(
                    '$codeProdSys',
                    '$Cantidad_Producto',
                    '$PrecioUnitario_Producto',
                    '$PorcentajeDescuento_Producto',
                    '$Devolucion_Producto',
                    '$Numero_Pedido'
                )");
            }

            return response()->json("Poductos Agregados ", 200);

        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }


    // OBTENEMOS TODOS LOS PEDIDOS POR CODIGO CLIENTE
    public function getAllByCodeCliente (Request $request)
    {

        try {

            $rs = null;

            $sql = "";
            if ($request->search != "") {
                $sql = " AND Pedido LIKE '%" . $request->search . "%' ";
            }


            // POR CLIENTE 
            if ($request->Codigo_Cliente != "") {
                $sql = $sql . " AND Codigo_Cliente = " . $request->Codigo_Cliente . " ";
            }

            $rs = DB::connection('sqlsrv')->select(" SELECT TOP 20 * FROM   VentasporComprobantes  
            where   (EstadoPedido = 'En Transito' 
            or EstadoPedido ='Cerrado' or EstadoPedido ='Reparto' or 
            EstadoPedido ='Visto' ) " . $sql . "  order by Fecha_EncabezadoVenta  ");

            if ($rs) {
                return response()->json($rs, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }

    }

    // OBTENEMOS TODOS LOS PEDIDOS EN TRAFICO
    public function getAllOrderMap (Request $request)
    {

        //return response()->json( (DB::connection('sqlsrv')->select('SELECT TOP 1 Fecha_EncabezadoVenta FROM VentasporComprobantes ORDER BY Fecha_EncabezadoVenta ASC ')));
//$estado=null,$desde=null,$hasta=null,$buscador=null
        try {
            $rs = null;

            $sql = "";

            if ($request->estado != "") {
                $sql = " AND (Estado LIKE '%" . $request->estado . "%' OR EstadoPedido LIKE '%" . $request->estado . "%' )";
            }

            if ($request->pedido != "") {
                $sql = " AND Pedido LIKE '%" . $request->pedido . "%' ";
            }

            if ($request->desde != "" && $request->hasta != "") {
                $sql = $sql . " AND Fecha_EncabezadoVenta BETWEEN '".$request->desde."' AND '".$request->hasta."'";
            }


            if ($request->buscador != "") {
                $sql = $sql . " AND (Clientes.Nombre_Cliente LIKE '%" . $request->buscador . "%' ";
                $sql = $sql . " OR VentasporComprobantes.Nombre_Transporte LIKE '%" . $request->buscador . "%' ";
                $sql = $sql . " OR VentasporComprobantes.Pedido LIKE '%" . $request->buscador . "%' ";
                $sql = $sql . " OR Clientes.Telefonos_Cliente LIKE '%" . $request->buscador . "%' ";
                $sql = $sql . " OR Clientes.Email_Cliente LIKE '%" . $request->buscador . "%' )";
            }

            if($request->top!=""){
                $request->top="TOP ".$request->top;
            }else{
                $request->top="TOP 50";
            }


           $rs = DB::connection('sqlsrv')->select(" SELECT ".$request->top ." VentasporComprobantes.*,Clientes.Telefonos_Cliente,Clientes.Email_Cliente,Clientes.Nombre_Cliente
            FROM   VentasporComprobantes,Clientes 
            where EstadoPedido != 'En Transito' " . $sql . " AND Clientes.Codigo_Cliente=VentasporComprobantes.Codigo_Cliente 
            order by Fecha_EncabezadoVenta  ");


            if ($rs) {
                    return response()->json($rs, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            if($e->getCode()=='08001'){

                return response()->json("Error por inestabilidad de conexión con el servidor, por favor intente mas tarde",500);
            }

            return response()->json("Error conectando a el DC", 500);
        }

    }


    // AGREGAR CLEINTES DE MERCADO LIBRE
    public static function addClientMl (Request $request)
    {
        try {

            DB::connection('sqlsrv')->insert("  INSERT INTO tb_clientes_ml
                    (nameUser
                    ,nombreApellidoCliente
                    ,numeroDocumento
                    ,domicilio
                    ,codigoPostal
                    ,localidad
                    ,provincia
                    ,email
                    ,telefono
                    ,isConfirm
                    )
                VALUES (
                 '$request->nameUser',
                '$request->nombreApellidoCliente',
                '$request->numeroDocumento',
                '$request->domicilio',
                '$request->codigoPostal',
                '$request->localidad',
                '$request->provincia',
                '$request->email',
                '$request->telefono',
                '1'
              )");

            return response()->json("Cliente creado ", 200);

        } catch (\Exception $e) {
            //dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


    // AGREGAR CLEINTES DE MERCADO LIBRE
    public static function getClientMlByUser ($nameUser)
    {
        try {


            $rs = DB::connection('sqlsrv')->select(" SELECT * FROM tb_clientes_ml
                   WHERE nameUser = '" . $nameUser . "' ");

            if ($rs) {
                //dd($rs);
                return response()->json($rs, 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }

        } catch (\Exception $e) {
            dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


    public function updateClienteMl (Request $request)
    {

        try {
            DB::connection('sqlsrv')->update("  UPDATE tb_clientes_ml
             set 
                   nameUser = '$request->nameUser',
                   nombreApellidoCliente = '$request->nombreApellidoCliente',
                   numeroDocumento = '$request->numeroDocumento',
                   domicilio = '$request->domicilio',
                   codigoPostal = '$request->codigoPostal',
                   localidad = '$request->localidad',
                   provincia = '$request->provincia',
                   email = '$request->email',
                   telefono = '$request->telefono'
             where idCliente = $request->idCliente
              ");

            return response()->json("Confrimado", 200);

        } catch (\Exception $e) {
            // dd($e);
            return response()->json("Error conectando a el DC", 500);
        }
    }


}
