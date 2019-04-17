<?php

namespace App\Http\Controllers;

use App\Clasificado;
use App\LocalesAdherido;
use App\StatusSistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class ClasificadoController extends Controller {
    public function store(Request $request) {
        $this->validate($request, [
            'titulo' => 'required',
            'foto'   => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'titulo.required' => 'El campo es requerido',
            'foto.required'   => 'El campo es requerido',
            'foto.image'      => 'La imagen debe tener el formato jpeg, pnp,gif,svg',

        ]);

        DB::beginTransaction();

        try {

            $clasificados = new Clasificado($request->all());

            if (is_null($request->foto)) {
            } else {

                /*para la foto*/
                $originalImage = $request->foto;

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = 'png';
                //$extension = $originalImage->getClientOriginalExtension();
                $nombre_interno1 = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno1 = str_slug($nombre_interno1, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\Clasificados\\'.$nombre_interno1, (string) $thumbnailImage->encode());
                /*para la foto*/

                $clasificados->foto = $nombre_interno1;
            }
            $clasificados->fk_idUser          = Auth::user()->fk_idPerfil;
            $clasificados->fk_idStatusSistema = 1;

            $clasificados->save();
            $clasificados->user;

            $response = [
                'msj'         => 'Clasificado Creado exitosamente',
                'Clasificado' => $clasificados,
                'ruta_imagen' => asset('storage\\Clasificados\\'.$clasificados->foto),
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en ClasificadoController: '.$e->getMessage().', Linea: '.$e->getLine());

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

            $clasificados = Clasificado::offset($request->offset)->limit($request->limit)->with('user')->get();
        } else {
            if ($request->exists('search')) {

                $busqueda = "%".$request->search."%";

                $clasificados = Clasificado::where('titulo', 'like', $busqueda)->with('user')->get();
            } else {

                $clasificados = Clasificado::with('user')->get();
            }
        }

        $clasificados->each(function($clasificados) {
            $status                       = StatusSistema::find($clasificados->fk_idStatusSistema);
            $clasificados->foto           = asset('storage\\Clasificados\\'.$clasificados->foto);
            $clasificados->status_sistema = $status->descripcion;
        });

        $response = [
            'msj'         => 'Lista de Clasificados',
            'Clasificado' => $clasificados,
        ];

        return response()->json($response, 201);
    }

    public function listarPorId(Request $request, $idClasificado) {

        $clasificados = Clasificado::with('user')->find($idClasificado);

        if (! is_null($clasificados)) {
            $clasificados->each(function($clasificados) {
                $clasificados->set_imagen = asset('storage\\Clasificados\\'.$clasificados->foto);
            });
        }

        $status                          = StatusSistema::find($clasificados->fk_idStatusSistema);
        $clasificados->nameStatusSistema = $status->descripcion;

        $response = [
            'msj'         => 'Lista clasificados',
            'Clasificado' => $clasificados,
        ];

        return response()->json($response, 201);

        $clasificados = Clasificado::with('user')->findOrFail($idClasificado);

        $response = [
            'msj'         => 'Lista de Clasificados',
            'Clasificado' => $clasificados,
        ];

        return response()->json($response, 201);
    }

    public function destroy($idClasificado) {

        $localAdherido = LocalesAdherido::where('fk_idClasificado', $idClasificado)->get();

        if (count($localAdherido) >= 1) {
            $response = [
                'msj' => 'No se puede eliminar el clasificado!, existen locales adheridos relacionados',
            ];

            return response()->json($response, 409);
        } else {

            DB::beginTransaction();

            try {
                $clasificados = Clasificado::find($idClasificado);

                if (is_null($clasificados)) {
                    $response = [
                        'msj' => 'El clasificado con id: '.$idClasificado.' no existe',
                    ];

                    return response()->json($response, 404);
                }

                $clasificados->delete();

                $response = [
                    'msj' => 'Clasificado eliminado Correctamente',
                ];

                DB::commit();

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en ClasificadoController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de eliminar los datos',
                ], 500);
            }
        }


    }

    public function editar(Request $request, $idClasificado) {

        if ($request->all() == "[]") {
            $response = [
                'msj' => 'debe enviar algún parametro para actualizar',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();
        try {
            $clasificados = Clasificado::findOrFail($idClasificado);

            $clasificados->fill($request->all());

            if ($request->foto) {
                $originalImage = $request->foto;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = 'png';
                //$extension = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\Clasificados\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $clasificados->foto = $nombre_interno;
            }

            $clasificados->save();

            $response = [
                'msj'          => 'Info actulizada',
                'Clasificados' => $clasificados,
                'ruta_imagen'  => asset('storage\\Clasificados\\'.$clasificados->foto),
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            //DB::rollback();
            Log::error('Ha ocurrido un error en ClasificadoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos. El Local que intenta Editar tal vez no existe',
            ], 500);
        }
    }

    public function listaPorNro($nro) {

        $clasificados = Clasificado::limit($nro)->get();

        $response = [
            'msj'         => 'Lista clasificados',
            'Clasificado' => $clasificados,
        ];

        return response()->json($response, 201);

    }

}
