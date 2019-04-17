<?php

namespace App\Http\Controllers;

use App\Chage_user;
use App\Coupons;
use App\CouponsClient;
use App\TipoDescuento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;
use PDF;

class CouponsController extends Controller
{
    //
    public function pdf($idCoupon=false,$userId=false)
    {

        if(!$userId){
            $response = [
                'msj'   => 'Falta pasar el id del usuario',
            ];
            return response()->json($response, 404);
        }

        $data=CouponsClient::with('Coupons','user')
            ->where('fk_idSatate', 1)
            ->where('fk_idcoupons',$idCoupon)
            ->where('fk_idUser',$userId)
            ->get();


        if($idCoupon==false || count($data)<=0){
            $response = [
                'msj'   => 'Usted no tiene este cupon',

            ];

            return response()->json($response, 404);
        }


        $pdf = PDF::loadView('pdf/index', $data[0]);
        return $pdf->download('a.pdf');
    }

    public function create(Request $request)
    {

        $this->validate($request, [
            'filename'      => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'fk_idProducto' => 'required',
            'title'         => 'required',
            'description'   => 'required',
            'dateExpired'   => 'required',

            'tipo_descuento' => 'required',
        ], [
            'filename.required'      => 'El campo es requerido',
            'fk_idProducto.required' => 'El campo es requerido',
            'title.required'         => 'El campo es requerido',
            'description.required'   => 'El campo es requerido',
            'dateExpired.required'   => 'El campo es requerido',

            'tipo_descuento.required' => 'El campo es requerido',
        ]);

        if ($request->tipo_descuento == 1) { //porcentual

            $this->validate($request, [
                'monto' => 'required',
            ], [
                'monto.required' => 'El campo es requerido',
            ]);
        }

        if ($request->tipo_descuento == 2) { //promocional

            $this->validate($request, [
                'promo' => 'required',
            ], [
                'promo.required' => 'El campo es requerido',
            ]);
        }

        if ($request->tipo_descuento != 1 && $request->tipo_descuento != 2) {
            $response = [
                'msj'                => 'El Estatus no existe',
                'estatusDisponibles' => TipoDescuento::select(['idTipoDescuento', 'descripcion'])->get(),
            ];

            return response()->json($response, 404);
        }

        $originalImage = $request->filename;

        $thumbnailImage = Image::make($originalImage);

        $thumbnailImage->fit(1230, 512, function ($constraint) {
            $constraint->aspectRatio();
        });

        $nombre_publico = $originalImage->getClientOriginalName();
        $extension      = 'png';
        //$extension = $originalImage->getClientOriginalExtension();

        $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
        $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

        Storage::disk('local')->put('\\coupons\\'.$nombre_interno, (string) $thumbnailImage->encode());

        try {
            DB::beginTransaction();

            $Coupons                = new Coupons();
            $Coupons->imagen        = $nombre_interno;
            $Coupons->fk_idProducto = $request->fk_idProducto;
            $Coupons->title         = $request->title;
            $Coupons->description   = $request->description;
            $Coupons->dateExpired   = $request->dateExpired;
            $Coupons->codeCoupns    = strtoupper($this->_getCodeSys());
            $Coupons->fk_idSatate   = 1;

            $Coupons->tipo_descuento = $request->tipo_descuento;
            $Coupons->monto          = $request->monto;
            $Coupons->promo          = $request->promo;
            $Coupons->base_cond      = $request->base_cond;
            $Coupons->activar_uso    = $request->activar_uso;

            $Coupons->save();
            DB::commit();

            $response = [
                'msj'   => 'Cupon guardado exitosamente',
                'cupon' => $Coupons,
            ];

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en CouponsController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function _getCodeSys()
    {

        $oldCode = 0;
        $rs      = Coupons::orderBy('idCoupons', 'DESC')->first();
        if ($rs) {
            $oldCode = $rs->idCoupons;
        }

        return substr(md5($oldCode), 0, 5);
    }

    public function listar(Request $request)
    {

        $this->validate($request, [
            'active' => 'required',
        ], [
            'active.required' => 'El campo es requerido',
        ]);

        $Coupons = Coupons::leftjoin("tb_productos", "tb_productos.idProducto", "=", "tb_coupons.fk_idProducto");

        $date = date('Y-m-d');
        if ($request->active) { // Solo no expiradas
            $Coupons->where('dateExpired', '>=', $date);
        }

        if ($request->search != "") {
            $Coupons->where('codeCoupns', 'like', '%'.$request->search.'%');
            $Coupons->orWhere('title', 'like', '%'.$request->search.'%');
            $Coupons->orWhere('description', 'like', '%'.$request->search.'%');
        }

        $result = $Coupons->get();

        $result->each(function ($result) {
            $result->set_imagen = asset('storage\\coupons\\'.$result->imagen);
        });

        $response = [
            'msj'     => 'Lista de Cupones',
            'cupones' => $result,
        ];

        return response()->json($response, 200);
    }

    public function listarPorId($idCoupons)
    {

        $Coupons = Coupons::where('fk_idSatate', 1)->where('idCoupons', $idCoupons)->first();

        $response = [
            'msj'   => 'Resultado del cupon: '.$idCoupons,
            'cupon' => $Coupons,
        ];

        return response()->json($response, 200);
    }

    public function listarPorIdUsuario($fk_idUser)
    {

        $Coupons = Coupons::select("*")->leftjoin("tb_coupons_client", "tb_coupons_client.fk_idcoupons", "=", "tb_coupons.idCoupons")->where('tb_coupons_client.fk_idSatate', 1)->where('fk_idUser', $fk_idUser)->get();

        $Coupons->each(function ($Coupons) {
            $Coupons->set_imagen = asset('storage\\coupons\\'.$Coupons->imagen);
        });

        $response = [
            'msj'   => 'Cupones del cliente ',
            'cupon' => $Coupons,

        ];

        return response()->json($response, 200);
    }

    public function obtenerCupon(Request $request)
    {

        $this->validate($request, [
            'fk_idcoupons' => 'required',
        ], [
            'fk_idcoupons.required' => 'El campo es requerido',
        ]);

        DB::beginTransaction();

        try {
            $cupon = CouponsClient::where("fk_idUser", Auth::user()->id)
                ->where("fk_idcoupons", $request->fk_idcoupons)
                ->first();

            if ($cupon) {
                return response()->json('Usted ya posee este cupon', 200);
            } else {

                $Coupons               = new CouponsClient();
                $Coupons->fk_idUser    = Auth::user()->id;
                $Coupons->fk_idcoupons = $request->fk_idcoupons;
                $Coupons->fk_idSatate  = 1;
                $Coupons->save();

                $response = [
                    'msj'   => 'Cupon Obtenido',
                    'cupon' => $Coupons,
                ];
                DB::commit();

                return response()->json("Ya tienes el cupon, puedes verlo en tu perfil.", 200);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en CouponsController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function chague($idCuponsClient = null)
    {

        if (is_null($idCuponsClient)) {
            $response = [
                'msj' => 'Falta el id del cupo',
            ];

            return response()->json($response, 404);
        } else {

            $changUser = Chage_user::where("idUser", Auth::user()->id)->where("idCuponsClient", $idCuponsClient)->first();

            if ($changUser) {
                return response()->json('Usted ya Canjeo este cupon', 400);
            } else {

                DB::beginTransaction();

                try {
                    $cupon              = CouponsClient::where('fk_idcoupons', $idCuponsClient)->first();
                    $cupon->fk_idSatate = 2;
                    $cupon->update();

                    $changeUser = New Chage_user(['idUser' => Auth::user()->id, 'idCuponsClient' => $idCuponsClient]);
                    $changeUser->save();

                    $response = [
                        'msj'   => 'Cupon cangeado correctamente',
                        'cupon' => $cupon,
                    ];
                    DB::commit();

                    return response()->json($response, 200);
                } catch (\Exception $e) {
                    DB::rollback();
                    Log::error('Ha ocurrido un error en CouponsController: '.$e->getMessage().', Linea: '.$e->getLine());

                    return response()->json([
                        'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                    ], 500);
                }
            }
        }
    }

    public function deleteCuponCliente($id)
    {

        DB::beginTransaction();

        try {
            $CupoCliente = CouponsClient::findOrFail($id);
            $CupoCliente->delete();

            $response = [
                'msj' => 'Cupon eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en CouponsController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listarTodo()
    {

        $todo = Coupons::where('fk_idSatate', 1)->get();

        $todo->each(function ($todo) {
            if (is_null($todo->imagen)) {
                $todo->set_imagen = null;
            } else {
                $todo->set_imagen = asset('storage\\coupons\\'.$todo->imagen);
            }
        });

        $response = [
            'msj'     => 'Lista de Cupones',
            'cupones' => $todo,
        ];

        return response()->json($response, 201);
    }

    public function updateCupon(Request $request, $idCupons)
    {
        DB::beginTransaction();
        try {
            $cupon = Coupons::findOrFail($idCupons);

            if ($request->all() == "[]") {
                $response = [
                    'msj' => 'debe enviar algún parametro para actualizar',
                ];

                return response()->json($response, 404);
            }
            $cupon->fill($request->all());

            if ($request->filename) {
                $originalImage = $request->filename;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1230, 512, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = 'png';
                //$extension = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\coupons\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $cupon->imagen = $nombre_interno;
            }

            $cupon->save();

            $response = [
                'msj'   => 'Info del Cupon actulizada',
                'cupon' => $cupon,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            //DB::rollback();
            Log::error('Ha ocurrido un error en CouponsController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function deleteCupon($idCupons = null)
    {
        if (is_null($idCupons)) {

            $response = [
                'msj' => 'Debe enviar por cabecera el di del cupon a eliminar',
            ];

            return response()->json($response, 404);
        } else {

            $cupon = Coupons::findOrFail($idCupons);

            $cupon->fill(['fk_idSatate' => 3]); //eliminar logicamente

            $response = [
                'msj' => 'Cupon eliminado exitosamente',
            ];

            return response()->json($response, 201);
        }
    }
}
