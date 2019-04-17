<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '500');


use App\ConfigFooter;
use App\costosEnvio;
use App\Producto;
use App\TagProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function buscarGeneral($search = null, $precioMin = 0, $precioMax = null) {


        if($precioMin=='undefined' || $precioMin=='' ||  is_null($precioMin))
        {
            $precioMin=0;
        }

        if($precioMax=='undefined' || $precioMax=='' ||  is_null($precioMax))
        {
            $precioMax=null;
        }


        /*IDENTIFICANDO EL PRECIO CONFIGURADO */
        $precioDefault = [
            1 => 'precioL1',
            2 => 'precioL2',
            3 => 'precioL3',
            4 => 'precioL4',
            5 => 'precioL5',
            6 => 'precioL6',
            7 => 'precioL7',
            8 => 'precioL8',
            9 => 'precioL9' ];
        $precio        = ConfigFooter::select('listaPrecio', 'listaPrecioDistribuidor')->first();
        $campoAbuscar  = @$precioDefault[$precio->listaPrecio];
        /*IDENTIFICANDO EL PRECIO CONFIGURADO */


        /*SI EL CONFIG FOOTER NO ESTA CONFIGURADO ENTONCES SE BUSCA EN EL PRIMER PRECIO*/
        if (is_null($campoAbuscar)) {
            $campoAbuscar = $precioDefault[1];
        }

        /*SI NO SE ENVIA EL MAXIMO, ENTONCES SE BUSCA EN LA LISTA*/
        if (is_null($precioMax)) {
            $precioMax = Producto::select($campoAbuscar)->orderBy($campoAbuscar, 'DESC')->first();
            $precioMax = $precioMax[$campoAbuscar];
        }

        $precioMax = (float) $precioMax;
        $precioMin = (float) $precioMin;


        if (! is_null($search)) {

            $busqueda = "%".$search."%";

            $mascotas = Producto::where(function($query) use ($busqueda) {
                $query->where('rubro', 'like', $busqueda)
                    ->orWhere('SubRubro1', 'like', $busqueda)
                    ->orWhere('SubRubro2', 'like', $busqueda);
            })
                ->where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();


            $marcas = Producto::Where('marca', 'like', $busqueda)
                ->where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();

            $nombre = Producto::Where('nombre', 'like', $busqueda)
                ->where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();

            $tags = Producto::select('tb_tag_producto.tag')
                ->join('tb_tag_producto', 'tb_productos.codeProdSys', '=', 'tb_tag_producto.codeProdSys')
                ->where('tb_productos.nombre', 'like', $busqueda)
                ->where('tb_productos.fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('tb_productos.Agrupacion')
                ->distinct()
                ->get();


            $mascotas = $this->getAgrupation($mascotas, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            $marcas   = $this->getAgrupation($marcas, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            $nombre   = $this->getAgrupation($nombre, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            //$tags     = $this->getAgrupation($tags);// OBTEBNER LISTADO DE TAGS DE UN PRODUCTO //

            $array_tags = [];

            if (count($tags) > 0) {
                foreach ($tags as $tag) {
                    $array_tags[] = $tag->tag;
                }
            }


            $response = [
                'msj'      => 'Productos',
                'mascotas' => $mascotas,
                'marcas'   => $marcas,
                'nombre'   => $nombre,
                'tags'     => $array_tags,
            ];


            return response()->json($response, 200);

        } else {

            $mascotas = Producto::where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();

            $marcas = Producto::where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();

            $nombre = Producto::where('fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();

            $tags = Producto::select(DB::raw('tb_productos.*'))
                ->join('tb_tag_producto', 'tb_productos.codeProdSys', '=', 'tb_tag_producto.codeProdSys')
                ->where('tb_productos.fk_idSatate', '=', 1)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->groupBy('Agrupacion')
                ->get();


            $mascotas = $this->getAgrupation($mascotas, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            $marcas   = $this->getAgrupation($marcas, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            $nombre   = $this->getAgrupation($nombre, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //
            $tags     = $this->getAgrupation($tags, $precioMin, $precioMax, $campoAbuscar);// OBTEBNER LISTADO DE PRESENTACIONES DE UN PRODUCTO //


            $response = [
                'msj'      => 'Lista de producto',
                'mascotas' => $mascotas,
                'marcas'   => $marcas,
                'nombre'   => $nombre,
                'tags'     => $tags,
            ];

            return response()->json($response, 404);
        }
    }


    public function listarPorIsOutstanding() {
        $producto_activador    = Producto::where('isOutstanding', 1)->groupBy('Agrupacion')->get();
        $producto_desactivador = Producto::where('isOutstanding', 0)->groupBy('Agrupacion')->get();


        $response = [
            'msj'          => 'Productos',
            'activados'    => $producto_activador,
            'desactivados' => $producto_desactivador,
        ];

        return response()->json($response, 200);
    }

    public function onIsOutstanding($idProducto) {
        DB::beginTransaction();

        try {
            $producto = Producto::findOrFail($idProducto);
            $producto->fill([
                'isOutstanding'      => 1,
                'fechaIsOutstanding' => Carbon::now()->toDateTimeString(),
            ]);

            $producto->save();

            DB::commit();

            $response = [
                'msj'  => 'Producto activado',
                'user' => $producto,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function offIsOutstanding($idProducto) {

        DB::beginTransaction();

        try {
            $producto = Producto::findOrFail($idProducto);
            $producto->fill([
                'isOutstanding'      => 0,
                'fechaIsOutstanding' => Carbon::now()->toDateTimeString(),
            ]);
            $producto->save();

            DB::commit();

            $response = [
                'msj'  => 'Producto desactivado',
                'user' => $producto,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en ProductoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
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

            $productos = Producto::offset($request->offset)->limit($request->limit)->get();
        } else {
            if ($request->exists('search')) {

                $busqueda = "%".$request->search."%";

                $productos = Producto::where('nombre', 'like', $busqueda)->where('fk_idSatate', '=', 1)->orWhere('titulo', 'like', $busqueda)->orWhere('categoria', 'like', $busqueda)->groupBy('Agrupacion')->get();
            } else {

                $productos = Producto::where('fk_idSatate', '=', 1)->groupBy('Agrupacion')->get();
            }
        }

        $response = [
            'msj'      => 'Lista de productos',
            'producto' => $productos,
        ];

        return response()->json($response, 201);
    }

    public function listarPorNombre($nombre) {

        $busqueda = $nombre."%";

        $productos = Producto::where('nombre', 'like', $busqueda)->where('fk_idSatate', '=', 1)->groupBy('Agrupacion')->get();

        $response = [
            'msj'       => 'Lista de productos',
            'productos' => $productos,
        ];

        return response()->json($response, 201);
    }

    public function index() {
        // todos los productos
        return Producto::get();
    }

    public static function create($_product) {
        $rs = Producto::where("codeProdSys", "=", $_product['codeProdSys'])
            ->where("arbol", "=", $_product['arbol'])
            ->where("rama", "=", $_product['rama'])
            ->first();


        if (! $rs) {

            $product                        = new Producto();
            $product->nombre                = $_product['nombre'];
            $product->titulo                = $_product['titulo'];
            $product->urlImage              = $_product['urlImage'];
            $product->promocion             = $_product['promocion'];
            $product->codeProdSys           = $_product['codeProdSys'];
            $product->kiloProdcuto          = $_product['kiloProdcuto'];
            $product->SubRubro1             = $_product['SubRubro1'];
            $product->SubRubro2             = $_product['SubRubro2'];
            $product->precioL1              = $_product['precioL1'];
            $product->precioL2              = $_product['precioL2'];
            $product->precioL3              = $_product['precioL3'];
            $product->precioL4              = $_product['precioL4'];
            $product->precioL5              = $_product['precioL5'];
            $product->precioL6              = $_product['precioL6'];
            $product->precioL7              = $_product['precioL7'];
            $product->precioL8              = $_product['precioL8'];
            $product->precioL9              = $_product['precioL9'];
            $product->rubro                 = $_product['rubro'];
            $product->marca                 = $_product['marca'];
            $product->fk_idSatate           = 1;
            $product->destacado             = 0;
            $product->isOutstanding         = 0;
            $product->Agrupacion            = $_product['Agrupacion'];
            $product->WebLink_Rubro         = $_product['WebLink_Rubro'];
            $product->Weblink_fabricante    = $_product['Weblink_fabricante'];
            $product->stockActual           = $_product['stockActual'];
            $product->Valoracion_Fabricante = $_product['Valoracion_Fabricante'];
            $product->WebLink_Subrubro1     = $_product['WebLink_Subrubro1'];
            $product->WebLink_Producto      = $_product['WebLink_Producto'];
            $product->arbol                 = $_product['arbol'];
            $product->rama                  = $_product['rama'];
            $product->WebLink_mascota       = $_product['WebLink_mascota'];


            $product->save();
        } else {

            $rs->nombre                = $_product['nombre'];
            $rs->titulo                = $_product['titulo'];
            $rs->urlImage              = $_product['urlImage'];
            $rs->promocion             = $_product['promocion'];
            $rs->codeProdSys           = $_product['codeProdSys'];
            $rs->kiloProdcuto          = $_product['kiloProdcuto'];
            $rs->SubRubro1             = $_product['SubRubro1'];
            $rs->SubRubro2             = $_product['SubRubro2'];
            $rs->precioL1              = $_product['precioL1'];
            $rs->precioL2              = $_product['precioL2'];
            $rs->precioL3              = $_product['precioL3'];
            $rs->precioL4              = $_product['precioL4'];
            $rs->precioL5              = $_product['precioL5'];
            $rs->precioL6              = $_product['precioL6'];
            $rs->precioL7              = $_product['precioL7'];
            $rs->precioL8              = $_product['precioL8'];
            $rs->precioL9              = $_product['precioL9'];
            $rs->rubro                 = $_product['rubro'];
            $rs->marca                 = $_product['marca'];
            $rs->fk_idSatate           = 1;
            $rs->Agrupacion            = $_product['Agrupacion'];
            $rs->WebLink_Rubro         = $_product['WebLink_Rubro'];
            $rs->Weblink_fabricante    = $_product['Weblink_fabricante'];
            $rs->stockActual           = $_product['stockActual'];
            $rs->Valoracion_Fabricante = $_product['Valoracion_Fabricante'];
            $rs->Valoracion_Fabricante = $_product['WebLink_Subrubro1'];
            $rs->Valoracion_Fabricante = $_product['WebLink_Producto'];
            $rs->arbol                 = $_product['arbol'];
            $rs->rama                  = $_product['rama'];
            $rs->WebLink_mascota       = $_product['WebLink_mascota'];
            $rs->update();
        }
    }

    public static function createTag($_tag) {

        $rs = TagProduct::where("codeProdSys", "=", $_tag['codeProdSys'])->where("tag", "=", $_tag['tag'])->first();

        if (! is_null($_tag['tag']) && ! is_null($_tag['codeProdSys'])) {
            if (! $rs) {
                $tag              = new TagProduct();
                $tag->tag         = @$_tag['tag'];
                $tag->codeProdSys = @$_tag['codeProdSys'];
                $tag->fk_idSatate = 1;
                $tag->save();
            } else {
                $tag              = new TagProduct();
                $tag->fk_idSatate = 1;
                $tag->update();
            }
        }
    }


    public static function getAllRubros() {

        $response = Producto::select('titulo', "rubro", "WebLink_Rubro")->where('fk_idSatate', '!=', '3')->groupBy('rubro')->orderBy("rubro")->get();

        return response()->json($response, 202);
    }

    public static function getAllMacotas() {

        try {
            $rs = null;
            $rs = DB::connection('sqlsrv')->select(" SELECT 
            Distinct Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar)  as Mascota,WebLink_TablaGenericaItem as WebLink_Rubro
            From vistaproductostagsapp 
            Where Descripcion_TablaGenerica = 'TIPO DE MASCOTAS' AND 
            Cast(Dato_tablaGenerica as varchar) <> ''
            Order by Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar)
           
            ");

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

    public static function getAllCategorias(Request $request) {

        try {
            $rs = null;
            $rs = DB::connection('sqlsrv')->select(" SELECT 
            Distinct Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar) as Categoria
            ,WebLink_Rubro as WebLink_SubRubro1
            From vistaproductostagsapp 
            Where Descripcion_TablaGenerica = 'EDAD' AND 
            Cast(Dato_tablaGenerica as varchar) <> '' AND (Select count(*) From vistaproductostagsapp 
            as vistaproductostagsapp2 where vistaproductostagsapp.Codigo_Producto = vistaproductostagsapp2.Codigo_Producto 
            and Cast(vistaproductostagsapp2.Dato_TablaGenerica as varchar) = '".$request->mascota."' ) > 0 
            Order by Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar)
            ");


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


    public static function getAllVariedades(Request $request) {

        try {
            $rs = null;
            $rs = DB::connection('sqlsrv')->select(" SELECT 
            Distinct Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar) as variedad,
            WebLink_Rubro as WebLink_SubRubro2
            From vistaproductostagsapp 
            Where Descripcion_TablaGenerica = 'VARIEDADES' AND 
            Cast(Dato_tablaGenerica as varchar) <> '' AND (Select count(*) From vistaproductostagsapp
             as vistaproductostagsapp2 where vistaproductostagsapp.Codigo_Producto = vistaproductostagsapp2.Codigo_Producto
              and Cast(vistaproductostagsapp2.Dato_TablaGenerica as varchar) = '".$request->mascota."' ) > 0 
              AND (Select count(*) From vistaproductostagsapp as vistaproductostagsapp2 
              where vistaproductostagsapp.Codigo_Producto = vistaproductostagsapp2.Codigo_Producto 
              and Cast(vistaproductostagsapp2.Dato_TablaGenerica as varchar) = '".$request->categoria."' ) > 0 
            Order by Descripcion_TablaGenerica, Cast(Dato_tablaGenerica as varchar)
            ");

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

    public static function getAllMarcas() {
        $response = Producto::select('marca', 'Weblink_fabricante')->where('fk_idSatate', '!=', '3')->groupBy('marca')->orderBy("marca")->get();

        return response()->json($response, 202);
    }

    public static function searchMarca($search = null) {

        if (! is_null($search)) {
            $busqueda = $search."%";
            $response = Producto::select("marca", "Weblink_fabricante")->where('fk_idSatate', '!=', '3')->where('marca', 'like', $busqueda)->groupBy('marca')->orderBy("marca")->get();

            if (is_null($response)) {
                $response = [
                    'msj' => 'Producto no encontrado',
                ];

                return response()->json($response, 404);
            } else {
                return response()->json($response, 202);
            }
        } else {

            $response = [
                'msj' => 'Debe enviar el criterio de búsqueda',
            ];

            return response()->json($response, 404);
        }
    }

    public function listarSubrubro1($rubro) {
        $response = Producto::select("SubRubro1", "WebLink_Subrubro1")
            ->groupBy('SubRubro1')
            ->orderBy("SubRubro1")
            ->where('fk_idSatate', '!=', '3')
            ->where("rubro", "=", $rubro)
            ->get();

        return response()->json($response, 202);
    }

    public function listarSubrubro2($SubRubro1) {
        $response = Producto::select("SubRubro2")
            ->groupBy('SubRubro2')
            ->orderBy("SubRubro2")
            ->where('fk_idSatate', '!=', '3')
            ->where("SubRubro1", "=", $SubRubro1)
            ->get();

        return response()->json($response, 202);
    }

    public function filtro3pack(Request $request) {

        /*Recibe: rubro, SubRubro1, SubRubro2*/
        /* NUEVO AJUSTE Recibe:  MASCOTA, CATEGORIA, VARIEDAD */

        if ($request->all() == []) {
            $response = [
                'msj' => 'Debe seleccionar algun criterio de busqueda (Recibe:  MASCOTA, CATEGORIA, VARIEDAD)',
            ];

            return response()->json($response, 401);

        } else {

            $busqueda_rubro     = $request->rubro;
            $busqueda_SubRubro1 = $request->subRubroA;
            $busqueda_SubRubro2 = $request->subRubroB;
            $OFFSET             = $request->OFFSET;
            $result             = [];


            $sql = "SELECT * FROM tb_productos where  fk_idSatate != 3  ";

            // MASCOTA
            if (! is_null($busqueda_rubro)) {
                //$sql = $sql." and rubro = '".$busqueda_rubro."' ";
                $sql = $sql." AND  (
                    Select count(*) From tb_productos as aux1
                    where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_rubro."') > 0 ";
            }

            // CATEGORIA
            if (! is_null($busqueda_SubRubro1)) {
                //$sql = $sql." and SubRubro1 = '".$busqueda_SubRubro1."' ";
                $sql = $sql." AND  (
                    Select count(*) From tb_productos as aux1
                    where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_SubRubro1."') > 0 ";
            }


            // VARIEDAD
            if (! is_null($busqueda_SubRubro2)) {
                //$sql = $sql." and SubRubro2 = '".$busqueda_SubRubro2."' ";
                $sql = $sql." AND  (
                    Select count(*) From tb_productos as aux1
                    where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_SubRubro2."') > 0 ";
            }

            $sql = $sql."  group by Agrupacion ";

            //dd($sql);

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

                $sql          = $sql."LIMIT ".$request->limit." OFFSET ".$request->offset.";";
                $result_unico = DB::connection('mysql')->select($sql);

                //$clasificados = Clasificado::offset($request->offset)->limit($request->limit)->with('user')->get();
            } else {

                $result_unico = DB::connection('mysql')->select($sql);
            }


            $result = $this->getAgrupation2(
                $result_unico,
                $busqueda_rubro,
                $busqueda_SubRubro1,
                $busqueda_SubRubro2);


            //$result_unico = array_unique($result);


            $response = [
                'msj'       => 'Lista de productos',
                'productos' => $result,
            ];

            return response()->json($response, 201);


        }

    }

    public function loMasVendido() {
        /*$LMV = DB::select('SELECT tb_productos.* FROM tb_order_body')
            ->join('tb_order_header', 'tb_order_header.idOrderHeader', 'tb_order_body.fk_idOrderHeader')
            ->join('tb_productos', 'tb_productos.codeProdSys', 'tb_order_body.codeProdSy')
            ->where('tb_order_header.fk_idStateOrder', 2)
            ->get();*/

        $LMV = DB::connection('mysql')->select("SELECT 
        tb_productos.*
        FROM tb_order_body 
        INNER JOIN tb_order_header ON tb_order_header.idOrderHeader = tb_order_body.fk_idOrderHeader 
        INNER JOIN tb_productos ON tb_productos.codeProdSys = tb_order_body.codeProdSys 
        WHERE tb_order_header.fk_idStateOrder = 2  and tb_productos.fk_idSatate = 1
        group  by   tb_productos.idProducto, tb_productos.nombre,tb_productos.urlImage,
        tb_productos.fk_idSatate,tb_productos.SubRubro2,tb_productos.precioL1,
        tb_productos.precioL2,tb_productos.precioL3,
        tb_productos.precioL4,tb_productos.precioL5,
        tb_productos.precioL6,tb_productos.precioL7,
        tb_productos.precioL8,tb_productos.precioL9,
        tb_productos.codeProdSys, tb_productos.kiloProdcuto
        LIMIT 10");

        return response()->json($LMV, 200);
    }

    public function listarPorid($idProducto) {

        $productos = Producto::findOrFail($idProducto);

        return response()->json($productos, 200);
    }


    public function getProductByRubro(Request $request) {
        try {

            /**/

            $rs = null;

            $sql          = "";
            $isWherActive = "where";

            if (! empty($request->rubro)) {
                $sql          = $isWherActive."  rubro = '".$request->rubro."' ";
                $isWherActive = " and ";
            }

            if (! empty($request->SubRubro1)) {
                $sql = $sql." ".$isWherActive."  SubRubro1 = '".$request->SubRubro1."' ";
                if ($isWherActive == "where") {
                    $isWherActive = " and ";
                }
            }

            if (! empty($request->SubRubro2)) {
                $sql = $sql." ".$isWherActive."  SubRubro2 = '".$request->SubRubro2."' ";
                if ($isWherActive == "where") {
                    $isWherActive = " and ";
                }

            }

            if (! empty($request->search)) {
                $sql = $sql." ".$isWherActive."  nombre  like '%".$request->search."%' ";

            }

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

                $rs = DB::connection('mysql')->select(" SELECT 
             idProducto as id,
             nombre as Descripcion_Producto,
             urlImage as WebLink_Producto,
             codeProdSys as Codigo_Producto,
             kiloProdcuto as Kilos_Producto,
             SubRubro1 as Descripcion_SubRubro1,
             SubRubro2 as Descripcion_Subrubro2,
             precioL1 as ListadePrecio1_Producto,
             precioL2 as ListadePrecio2_Producto,
             precioL3 as ListadePrecio3_Producto,
             precioL4 as ListadePrecio4_Producto,
             precioL5 as ListadePrecio5_Producto,
             precioL6 as ListadePrecio6_Producto,
             precioL7 as ListadePrecio7_Producto,
             precioL8 as ListadePrecio8_Producto,
             precioL9 as ListadePrecio9_Producto,
             rubro as Descripcion_Rubro,
             marca as Descripcion_Fabricante,
             WebLink_Rubro as WebLink_Rubro,
             Agrupacion as Agrupacion,
             Weblink_fabricante as WebLink_Fabricante,
             stockActual as StockActual_Producto,
             Valoracion_Fabricante as Valoracion_Fabricante
              FROM   tb_productos  
             ".$sql." order by nombre  ")->get();

            } else {

                $rs = DB::connection('mysql')->select(" SELECT 
             idProducto as id,
             nombre as Descripcion_Producto,
             urlImage as WebLink_Producto,
             codeProdSys as Codigo_Producto,
             kiloProdcuto as Kilos_Producto,
             SubRubro1 as Descripcion_SubRubro1,
             SubRubro2 as Descripcion_Subrubro2,
             precioL1 as ListadePrecio1_Producto,
             precioL2 as ListadePrecio2_Producto,
             precioL3 as ListadePrecio3_Producto,
             precioL4 as ListadePrecio4_Producto,
             precioL5 as ListadePrecio5_Producto,
             precioL6 as ListadePrecio6_Producto,
             precioL7 as ListadePrecio7_Producto,
             precioL8 as ListadePrecio8_Producto,
             precioL9 as ListadePrecio9_Producto,
             rubro as Descripcion_Rubro,
             marca as Descripcion_Fabricante,
             WebLink_Rubro as WebLink_Rubro,
             Agrupacion as Agrupacion,
             Weblink_fabricante as WebLink_Fabricante,
             stockActual as StockActual_Producto,
             Valoracion_Fabricante as Valoracion_Fabricante
              FROM   tb_productos  
             ".$sql." order by nombre  ");
            }


            $i = 0;
            foreach ($rs as $item) {

                if ($item->Agrupacion != null) {

                    $agrupacion = DB::connection('mysql')->select(" SELECT 
                      idProducto as id,
                     nombre as Descripcion_Producto,
                     urlImage as WebLink_Producto,
                     codeProdSys as Codigo_Producto,
                     kiloProdcuto as Kilos_Producto,
                     SubRubro1 as Descripcion_SubRubro1,
                     SubRubro2 as Descripcion_Subrubro2,
                     precioL1 as ListadePrecio1_Producto,
                     precioL2 as ListadePrecio2_Producto,
                     precioL3 as ListadePrecio3_Producto,
                     precioL4 as ListadePrecio4_Producto,
                     precioL5 as ListadePrecio5_Producto,
                     precioL6 as ListadePrecio6_Producto,
                     precioL7 as ListadePrecio7_Producto,
                     precioL8 as ListadePrecio8_Producto,
                     precioL9 as ListadePrecio9_Producto,
                     rubro as Descripcion_Rubro,
                     marca as Descripcion_Fabricante,
                     WebLink_Rubro as WebLink_Rubro,
                     Agrupacion as Agrupacion,
                     Weblink_fabricante as WebLink_Fabricante,
                     stockActual as StockActual_Producto,
                     Valoracion_Fabricante as Valoracion_Fabricante
                    FROM tb_productos  
                    where Agrupacion = '".$item->Agrupacion."' 
                    ");

                    $rs[$i]->listAgrupacion = $agrupacion;

                    // LITADO DE SUB ITEM //'
                    $rs1 = $agrupacion;
                    $j   = 0;

                    foreach ($rs1 as $item2) {

                        if ($item2->Agrupacion != null) {

                            $agrupacion2 = DB::connection('mysql')->select(" SELECT 
                             idProducto as id,
                             nombre as Descripcion_Producto,
                             urlImage as WebLink_Producto,
                             codeProdSys as Codigo_Producto,
                             kiloProdcuto as Kilos_Producto,
                             SubRubro1 as Descripcion_SubRubro1,
                             SubRubro2 as Descripcion_Subrubro2,
                             precioL1 as ListadePrecio1_Producto,
                             precioL2 as ListadePrecio2_Producto,
                             precioL3 as ListadePrecio3_Producto,
                             precioL4 as ListadePrecio4_Producto,
                             precioL5 as ListadePrecio5_Producto,
                             precioL6 as ListadePrecio6_Producto,
                             precioL7 as ListadePrecio7_Producto,
                             precioL8 as ListadePrecio8_Producto,
                             precioL9 as ListadePrecio9_Producto,
                             rubro as Descripcion_Rubro,
                             marca as Descripcion_Fabricante,
                             WebLink_Rubro as WebLink_Rubro,
                             Agrupacion as Agrupacion,
                             Weblink_fabricante as WebLink_Fabricante,
                             stockActual as StockActual_Producto,
                             Valoracion_Fabricante as Valoracion_Fabricante
                             FROM   tb_productos  
                            where Agrupacion = '".$item2->Agrupacion."' ");

                            $rs1[$j]->listAgrupacion = $agrupacion2;

                        }
                        $j++;
                    }

                }
                $i++;
            }


            if ($rs != null) {
                return response()->json($rs, 200);
            } else {
                return response()->json("Sin resultados", 204);
            }
        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }


    }

    public static function searchProductosMarca($search = null) {


        if (! is_null($search)) {
            $busqueda = $search."%";
            $response = Producto::where('marca', 'like', $busqueda)->orderBy("marca")->groupBy('Agrupacion')->get();
            $res      = self::getAgrupation2($response, null, null, null);

            if (is_null($response)) {
                $response = [
                    'msj' => 'Producto no encontrado',
                ];

                return response()->json($response, 404);
            } else {
                return response()->json($response, 202);
            }
        } else {

            $response = [
                'msj' => 'Debe enviar el criterio de búsqueda',
            ];

            return response()->json($response, 404);
        }
    }


    public function getCostos() {

        $rs = costosEnvio::get();
        if (is_null($rs)) {
            $response = [
                'msj' => 'Producto no encontrado',
            ];
            return response()->json($response, 404);
        } else {
            return response()->json($rs, 200);
        }
    }

    public function getCostos2() {

        $rs = costosEnvio::groupby('Descripcion_Zona')->get();
        if (is_null($rs)) {
            $response = [
                'msj' => 'Producto no encontrado',
            ];

            return response()->json($response, 404);
        } else {
            return response()->json($this->buscarZonas($rs), 200);
        }
    }

    public function buscarZonas($costos) {

        foreach ($costos as $key=>$costo) {
            $zona = costosEnvio::where('Descripcion_Zona',$costo->Descripcion_Zona)
                ->get();
            $listaProductos[$costo->Descripcion_Zona] = $zona;
        }
        return $listaProductos;
    }

    public function getCostosSincronize() {

        $rs = DB::connection('sqlsrv')->select(" SELECT * FROM  VistaZonasLocalidadesAPP where ISNULL(codigo_zona,'') != '' ");

        foreach ($rs as $item) {

            $product = [
                'Codigo_Localidad'      => $item->Codigo_Localidad,
                'Descripcion_Localidad' => $item->Descripcion_Localidad,
                'Codigo_Zona'           => $item->Codigo_Zona,
                'Descripcion_Zona'      => $item->Descripcion_Zona,
                'Codigo_Provincia'      => $item->Codigo_Provincia,
                'Descripcion_Provincia' => $item->Descripcion_Provincia,
                'Costo2'                => $item->Costo2,
            ];
            self::createCostos($product);


        }

        return response()->json("Costos por zonas actualizados correctamente", 200);
    }

    public static function createCostos($_product) {
        $rs = costosEnvio::where("Codigo_Localidad", "=", $_product['Codigo_Localidad'])->first();
        if (! $rs) {

            $product = new costosEnvio($_product);
            $product->save();
        } else {
            $rs->update($_product);
        }
    }


    public static function getAgrupation($listaProductos, $precioMin, $precioMax, $campoAbuscar) {
        $i = 0;
        foreach ($listaProductos as $itemMascotas) {
            $agrupacion = Producto::where('fk_idSatate', '=', 1)
                ->where('Agrupacion', '=', $itemMascotas->Agrupacion)
                ->whereBetween($campoAbuscar, [ $precioMin, $precioMax ])
                ->get();

            $listaProductos[$i]->listAgrupacion = $agrupacion;
            $i++;
        }

        return $listaProductos;
    }

    public static function getAgrupation2($listaProductos, $busqueda_rubro, $busqueda_SubRubro1, $busqueda_SubRubro2) {
        $i = 0;

        $sql      = "SELECT distinct kiloProdcuto, codeProdSys from tb_productos where  fk_idSatate = 1  ";
        $sqlextra = "";

        // MASCOTA
        if (! is_null($busqueda_rubro)) {
            //$sql = $sql." and rubro = '".$busqueda_rubro."' ";
            $sqlextra = $sqlextra." AND  (
                 Select count(*) From tb_productos as aux1
               where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_rubro."') > 0  ";
        }

        // CATEGORIA
        if (! is_null($busqueda_SubRubro1)) {
            //$sql = $sql." and SubRubro1 = '".$busqueda_SubRubro1."' ";
            $sqlextra = $sqlextra." AND  (
                Select count(*) From tb_productos as aux1
               where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_SubRubro1."') > 0 ";
        }


        // VARIEDAD
        if (! is_null($busqueda_SubRubro2)) {
            //$sql = $sql." and SubRubro2 = '".$busqueda_SubRubro2."' ";
            $sqlextra = $sqlextra." AND  (
               Select count(*) From tb_productos as aux1
               where  aux1.codeProdSys = tb_productos.codeProdSys  and  aux1.rama  = '".$busqueda_SubRubro2."') > 0 ";
        }


        foreach ($listaProductos as $itemMascotas) {
            //$agrupacion =


            Log::error($sql);
            $rs = DB::connection('mysql')->select($sql."  AND  Agrupacion = '".$itemMascotas->Agrupacion."' ".$sqlextra);

            //Log::error($rs);


            $lista = [];
            foreach ($rs as $item) {
                // Log::error($item->codeProdSys);
                $rs2 = DB::table('tb_productos')->where('codeProdSys', $item->codeProdSys)->first();
                array_push($lista, $rs2);

            }

            $listaProductos[$i]->listAgrupacion = $lista;
            $i++;
        }

        return $listaProductos;
    }

    public static function getArbolProductos(Request $request) {

        try {
            $rs = null;

            $sql = "SELECT DISTINCT Descripcion_TablaGenerica FROM       
            VistaProductosTagsAPP  WHERE  1=1  
            AND Descripcion_TablaGenerica!='PRESENTACIONES' 
            AND Descripcion_TablaGenerica!='AMBIENTE'
            AND Descripcion_TablaGenerica!='TIPO'";

            // MASCOTA
            if (! is_null($request->busqueda_rubro)) {
                $sql = $sql." AND ((SELECT     COUNT(*) AS Expr1
                         FROM         VistaProductosTagsAPP AS aux1
                         WHERE     (Codigo_Producto = VistaProductosTagsAPP.Codigo_Producto) AND (CAST(Dato_TablaGenerica AS varchar) = '".$request->busqueda_rubro."')) > 0)";
            }else{
                $sql = $sql." AND Descripcion_TablaGenerica!='TIPO DE MASCOTAS'";
            }

            // CATEGORIA
            if (! is_null($request->busqueda_SubRubro1)) {
                //$sql = $sql." and SubRubro1 = '".$busqueda_SubRubro1."' ";
                $sql = $sql." AND ((SELECT     COUNT(*) AS Expr1
                FROM         VistaProductosTagsAPP AS aux1
                WHERE     (Codigo_Producto = VistaProductosTagsAPP.Codigo_Producto) AND (CAST(Dato_TablaGenerica AS varchar) = '".$request->busqueda_SubRubro1."')) > 0) 
                AND Descripcion_TablaGenerica!='TIPO DE MASCOTAS'";

            }


            // VARIEDAD
            if (! is_null($request->busqueda_SubRubro2)) {
                //$sql = $sql." and SubRubro2 = '".$busqueda_SubRubro2."' ";
                $sql = $sql." AND ((SELECT     COUNT(*) AS Expr1
                         FROM         VistaProductosTagsAPP AS aux1
                         WHERE     (Codigo_Producto = VistaProductosTagsAPP.Codigo_Producto) AND (CAST(Dato_TablaGenerica AS varchar) = '".$request->busqueda_SubRubro2."')) > 0) 
                         AND Descripcion_TablaGenerica!='TIPO DE MASCOTAS'";


            }

            $sql = $sql." ORDER BY Descripcion_TablaGenerica";

            $rs = DB::connection('sqlsrv')->select($sql);

            if ($rs) {
                return response()->json(self::getHijosTablaGenerica($rs), 200);
            } else {
                return response()->json("No existe contenido ", 204);
            }
        } catch (\Exception $e) {
            dd($e);

            return response()->json("Error conectando a el DC", 500);
        }
    }

    public static function getHijosTablaGenerica($sql) {
        $i = 0;
        $j = 0;
        foreach ($sql as $sqls) {

            $rs = DB::connection('sqlsrv')->select("SELECT DISTINCT Atributo_TablaGenerica,
             CAST (Dato_TablaGenerica as VARCHAR ) AS  Dato_TablaGenerica
                    FROM VistaProductosTagsAPP 
                    WHERE Descripcion_TablaGenerica='".$sqls->Descripcion_TablaGenerica."'
                    GROUP BY Atributo_TablaGenerica, CAST (Dato_TablaGenerica as VARCHAR )
                    ORDER BY Atributo_TablaGenerica,Dato_TablaGenerica
                ");

            foreach ($rs as $rs1) {

                if ($rs1->Dato_TablaGenerica != "") {
                    //dd('as',$rs1->Dato_TablaGenerica);
                    $sql[$i]->hijos[$j] = $rs1;
                    $j++;
                }
            }
            $i++;
            $j = 0;
        }

        return $sql;
    }

    public function getProvincia() {

        $rs = DB::connection('sqlsrv')->select(" SELECT Descripcion_Provincia FROM  VISTALOCALIDADESAPP GROUP BY Descripcion_Provincia");

        if (is_null($rs)) {
            $response = [
                'msj' => 'Provincia no encontrada',
            ];

            return response()->json($response, 404);
        } else {
            return response()->json($rs, 200);
        }
    }

    public function getLocalidadPorProvincia($provincia) {

        $rs = DB::connection('sqlsrv')->select(" SELECT Codigo_Localidad,Descripcion_Localidad 
        FROM  VISTALOCALIDADESAPP 
        WHERE Descripcion_Provincia='".$provincia."'");

        if (is_null($rs)) {
            $response = [
                'msj' => 'Localidad no encontrada',
            ];

            return response()->json($response, 404);
        } else {
            return response()->json($rs, 200);
        }
    }

    public function asignarStockProcto(Request $request) {

        $this->validate($request, [
            'codeProdSys' => 'required',
            'stock'       => 'required',
            'rama'        => 'required',
        ], [
            'codeProdSys.required' => 'El campo es requetido',
            'stock.required'       => 'El campo es requetido',
            'rama.required'        => 'El campo es requetido',
        ]);

        $Co = Producto::where('codeProdSys', $request->codeProdSys)
            ->where('rama', $request->rama)
            ->get();

        if (count($Co) == 1) {

            $Co[0]->stockActual = $request->stock;
            $Co[0]->save();

            $response = [
                'msj'      => 'Se ha actualizado el stock del producto',
                'producto' => $Co,
            ];

            return response()->json($response, 201);
        } else {
            if (count($Co) == 0) {
                $response = [
                    'msj' => 'No hay productos con los parámetros enviados',
                ];

                return response()->json($response, 404);
            }
            $response = [
                'msj'                 => 'Hay mas de un producto con el codigo y rama actual',
                'productos_repetidos' => $Co,
            ];

            return response()->json($response, 404);
        }

    }

}
