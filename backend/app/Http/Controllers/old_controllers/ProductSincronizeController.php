<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Log;
use App\Producto;
use App\TagProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProductoController;


ini_set('memory_limit', '512M');
ini_set('max_execution_time', '500');

class ProductSincronizeController extends Controller {
    // OBTENEMOS TODOS LOS PRODUCTOS DISPONIBLES  EN EL SISTEMA 
    public function sicronizeProduct(Request $request) {


        $affectedRows = Producto::where('fk_idSatate', '!=', 3)->update([ 'fk_idSatate' => 3 ]);

        $rs = DB::connection('sqlsrv')->select(" SELECT * FROM  VistaProductosTagsAPP ");

        foreach ($rs as $item) {

            $product = [
                        'nombre'                => $item->Descripcion_Producto,
                        'titulo'                => $item->Descripcion_Producto,
                        'urlImage'              => $item->WebLink_Producto,
                        'promocion'             => "FALTA",
                        'codeProdSys'           => $item->Codigo_Producto,
                        'kiloProdcuto'          => $item->Kilos_Producto,
                        'SubRubro1'             => $item->Descripcion_SubRubro1,
                        'SubRubro2'             => $item->Descripcion_Subrubro2,
                        'precioL1'              => $item->ListadePrecio1_Producto,
                        'precioL2'              => $item->ListadePrecio2_Producto,
                        'precioL3'              => $item->ListadePrecio3_Producto,
                        'precioL4'              => $item->ListadePrecio4_Producto,
                        'precioL5'              => $item->ListadePrecio5_Producto,
                        'precioL6'              => $item->ListadePrecio6_Producto,
                        'precioL7'              => $item->ListadePrecio7_Producto,
                        'precioL8'              => $item->ListadePrecio8_Producto,
                        'precioL9'              => $item->ListadePrecio9_Producto,
                        'rubro'                 => $item->Descripcion_Rubro,
                        'marca'                 => $item->Descripcion_Fabricante,
                        'fk_idSatate'           => 1,
                        'destacado'             => 0,
                        'isOutstanding'         => 0,
                        'fechaIsOutstanding'    => "",
                        'WebLink_Rubro'         => $item->WebLink_Rubro,
                        'Agrupacion'            => $item->Agrupacion,
                        'Weblink_fabricante'    => $item->WebLink_Fabricante,
                        'stockActual'           => $item->StockActual_Producto,
                        'Valoracion_Fabricante' => $item->Valoracion_Fabricante,
                        'WebLink_Subrubro1' => $item->WebLink_Subrubro1,
                        'WebLink_Producto'  => $item->WebLink_Producto,
                        'arbol'  => $item->Descripcion_TablaGenerica,
                        'rama'=> $item->Dato_TablaGenerica,
                        'WebLink_mascota' => $item->WebLink_TablaGenericaItem

                            ];
                            ProductoController::create($product);

        }

        //$this->sicronizeTags();

        return response()->json("Productos actualizados", 200);


        // fk_idSatate

    }

    public function sicronizeTags() {
        $affectedRows = TagProduct::where('fk_idSatate', '!=', 3)->update([ 'fk_idSatate' => 3 ]);

        $rs = DB::connection('sqlsrv')->select(" SELECT * FROM  VistaProductosTagsAPP ");

        foreach ($rs as $item) {
            $tag = [
                'codeProdSys' => $item->Codigo_Producto,
                'tag'         => $item->Dato_TablaGenerica,
            ];

            if ($item->Codigo_Producto != "" && $item->Dato_TablaGenerica != "") {
                if ($item->Codigo_Producto != null && $item->Dato_TablaGenerica != null) {
                    ProductoController::createTag($tag);
                }
            }

        }
    }
}
