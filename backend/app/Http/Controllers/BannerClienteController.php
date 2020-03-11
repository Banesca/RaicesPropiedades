<?php

namespace App\Http\Controllers;

use App\BannerCliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class BannerClienteController extends Controller {

    public function store(Request $request) {
        $this->validate($request, [
            'dir_imagen' => 'required',
            'fk_idUser'  => 'required',
            'orden'      => 'required'
        ], [
            'dir_imagen.required' => 'El campo es requerido',
            'fk_idUser.required'  => 'El campo es requerido',
            'orden.required'      => 'El campo es requerido'
                    ]);

        DB::beginTransaction();

        try {

            $banner = new BannerCliente($request->all());

            if ($request->exists('dir_imagen')) {
                $originalImage = $request->dir_imagen;

                $thumbnailImage = Image::make($originalImage);

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\BannerClientes\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $banner->dir_imagen = $nombre_interno;
            }

            $banner->save();
            if ($request->exists('dir_imagen')) {
                $banner->urlImagen = asset('storage\\BannerClientes\\'.@$banner->dir_imagen);
            }

            $response          = [
                'msj'  => 'Banner registrado exitosamente',
                'banner' => $banner,
            ];
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en BannerClienteController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function update(Request $request, $idBannerCliente) {

        DB::beginTransaction();

        $this->validate($request, [
            'orden' => 'unique:tb_banner_clientes,orden,'.$request->idBannerCliente.',idBannerCliente',
        ], [
            'orden.unique' => 'Órden repetido',
        ]);

        try {
            $banner = BannerCliente::find($idBannerCliente);
            if (!is_null($banner)) {
                $banner->fill($request->all());

                if ($request->exists('dir_imagen')) {
                    $originalImage = $request->dir_imagen;

                    $thumbnailImage = Image::make($originalImage);

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\BannerClientes\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $banner->dir_imagen = $nombre_interno;
                }

                $banner->save();
                $banner->urlImagen = asset('storage\\BannerClientes\\'.@$banner->dir_imagen);
                DB::commit();

                $response = [
                    'msj'  => 'BannerCliente actualizada exitosamente',
                    'banner' => $banner,
                ];

                return response()->json($response, 200);
            } else {
                return response()->json([
                    'message' => 'No existe el banner especificado',
                ], 500);
            }

        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en BannerClienteController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idBannerCliente) {

        DB::beginTransaction();

        try {
            $banner = BannerCliente::find($idBannerCliente);

            if (is_null($banner)) {

                $response = [
                    'msj' => 'BannerCliente no existe',
                ];

                return response()->json($response, 401);
            }

            $banner->delete();
            $response = [
                'msj' => 'BannerCliente eliminado correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en BannerClienteController: '.$e->getMessage().', Linea: '.$e->getLine());

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

            $banners = BannerCliente::offset($request->offset)->limit($request->limit)->orderby('orden','ASC')->get();
        } else {
            $banners = BannerCliente::orderby('orden','ASC')->get();
        }

        $banners->each(function($banners) {
            $banners->urlImagen = asset('storage\\BannerClientes\\'.$banners->dir_imagen);
        });

        $response = [
            'msj'   => 'Lista de Banners',
            'banner' => $banners,
        ];

        return response()->json($response, 200);
    }

    public function listarPorId($id) {

        $banner            = BannerCliente::find($id);
        if (!is_null($banner)) {
            $banner->urlImagen = asset('storage\\BannerClientes\\'.@$banner->dir_imagen);
        }

        $response          = [
            'msj'  => 'BannerCliente',
            'banner' => $banner,
        ];

        return response()->json($response, 200);
    }

}
