<?php

namespace App\Http\Controllers;

use App\LocalesAdherido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class LocalesAdheridoController extends Controller
{
    public function store(Request $request)
    {

        $this->validate($request, [
            'fk_idClasificado' => 'required',
            'nombre'           => 'required',
            'descripcion'      => 'required',
            'foto_1'           => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'foto_2'           => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'fk_idClasificado.required' => 'El campo es requerido',
            'nombre.required'           => 'El campo es requerido',
            'descripcion.required'      => 'El campo es requerido',
            'foto_1.required'           => 'El campo es requerido',
            'foto_2.required'           => 'El campo es requerido',
            'foto_1.image'              => 'La imagen debe tener el formato jpeg, pnp,gif,svg',
            'foto_2.image'              => 'La imagen debe tener el formato jpeg, pnp,gif,svg',
            'foto_1.mimes'              => 'La imagen debe tener el formato jpeg, pnp,gif,svg',
            'foto_2.mimes'              => 'La imagen debe tener el formato jpeg, pnp,gif,svg',
        ]);

        DB::beginTransaction();

        try {

            $localesA = new LocalesAdherido($request->all());

            if (is_null($request->foto_1)) {
            } else {

                /*para la foto*/
                $originalImage = $request->foto_1;

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(2048, 2048, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension='png';
                //$extension = $originalImage->getClientOriginalExtension();
                $nombre_interno1 = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno1 = str_slug($nombre_interno1, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\localesAdheridos\\'.$nombre_interno1, (string) $thumbnailImage->encode());
                /*para la foto*/

                $localesA->foto_1 = $nombre_interno1;

                /*para la foto*/
                $originalImage = $request->foto_2;

                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(2048, 2048, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension='png';
                //$extension = $originalImage->getClientOriginalExtension();
                $nombre_interno2 = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno2 = str_slug($nombre_interno2, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\localesAdheridos\\'.$nombre_interno2, (string) $thumbnailImage->encode());
                /*para la foto*/

                $localesA->foto_2 = $nombre_interno2;
            }
            $localesA->fk_idUser = Auth::user()->fk_idPerfil;

            $localesA->save();

            $response = [
                'msj'      => 'Local Creado',
                'LocalAdh' => $localesA,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en LocalesAdheridoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function listar(Request $request)
    {

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

            $localesA = LocalesAdherido::offset($request->offset)->limit($request->limit)->with('user')->get();
        } else {
            if ($request->exists('search')) {

                $busqueda = "%".$request->search."%";

                $localesA = LocalesAdherido::where('nombre', 'like', $busqueda)->orWhere('descripcion', 'like', $busqueda)->with('user')->get();
            } else {

                $localesA = LocalesAdherido::with('user')->get();
            }
        }

        $localesA->each(function ($localesA) {
            $localesA->set_imagen_uno = asset('storage\\localesAdheridos\\'.$localesA->foto_1);
            $localesA->set_imagen_dos = asset('storage\\localesAdheridos\\'.$localesA->foto_2);
        });

        $response = [
            'msj'      => 'Lista de Locales Adheridos',
            'LocalAdh' => $localesA,
        ];

        return response()->json($response, 201);
    }

    public function listarPorId(Request $request, $idLocalAdherido)
    {
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

            $localesA = LocalesAdherido::offset($request->offset)->limit($request->limit)->with('user')->get();
        } else {
            if ($request->exists('search')) {

                $busqueda = "%".$request->search."%";

                $localesA = LocalesAdherido::where('nombre', 'like', $busqueda)->orWhere('descripcion', 'like', $busqueda)->with('user')->get();
            } else {

                $localesA = LocalesAdherido::find($idLocalAdherido);
            }
        }
        if (! is_null($localesA)) {
            $localesA->each(function ($localesA) {
                $localesA->set_imagen = asset('storage\\localesAdheridos\\'.$localesA->imagen);
            });
        }

        $response = [
            'msj'      => 'Lista de Locales Adheridos',
            'LocalAdh' => $localesA,
        ];

        return response()->json($response, 201);

        $localesA = LocalesAdherido::with('user')->findOrFail($idLocalAdherido);

        $response = [
            'msj'      => 'Lista de Locales Adheridos',
            'LocalAdh' => $localesA,
        ];

        return response()->json($response, 201);
    }

    public function destroy($idLocalAdherido)
    {

        DB::beginTransaction();

        try {
            $localesA = LocalesAdherido::findOrFail($idLocalAdherido);
            $localesA->delete();

            $response = [
                'msj' => 'Local Adherido eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en LocalesAdheridoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function editar(Request $request, $idLocalAdherido)
    {
        if ($request->all() == "[]") {
            $response = [
                'msj' => 'debe enviar algún parametro para actualizar',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();
        try {
            $localesA = LocalesAdherido::findOrFail($idLocalAdherido);

            $localesA->fill($request->all());

            if ($request->foto_1) {
                $originalImage = $request->foto_1;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension='png';
                //$extension = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\localesAdheridos\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $localesA->foto_1 = $nombre_interno;
            }

            if ($request->foto_2) {
                $originalImage = $request->foto_2;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function ($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension='png';
                //$extension = $originalImage->getClientOriginalExtension();

                $nombre_interno2 = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno2 = str_slug($nombre_interno2, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\localesAdheridos\\'.$nombre_interno2, (string) $thumbnailImage->encode());

                $localesA->foto_2 = $nombre_interno2;
            }

            $localesA->save();

            $response = [
                'msj'   => 'Info de los locales actulizada',
                'LocalAdh' => $localesA,
                'ruta_imagen'  => asset('storage\\localesAdheridos\\'),
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            //DB::rollback();
            Log::error('Ha ocurrido un error en LocalesAdheridoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos. El Local que intenta Editar tal vez no existe',
            ], 500);
        }
    }

    public function listaLocalesPorNro($nro){
        $locales_adheridos = LocalesAdherido::limit($nro)->get();

        $response = [
            'msj'         => 'Lista Locales Adheridos',
            'locales_adheridos' => $locales_adheridos,
        ];

        return response()->json($response, 201);        
    }

    public function turnoDeUnLocalAdh($idLocalAdherido){

        $l=LocalesAdherido::find($idLocalAdherido);
        if(!is_null($l)){
            $response = [
                'turno' => $l->turno['fechaHora'],
            ];

            return response()->json($response, 201);
        }
    }

    public function listarPorIdClasificado($fk_idClasificado){
        $localesA=LocalesAdherido::with('user')->where('fk_idClasificado',$fk_idClasificado)->get();

        $localesA->each(function ($localesA) {
            $localesA->set_imagen_uno = asset('storage\\localesAdheridos\\'.$localesA->foto_1);
            $localesA->set_imagen_dos = asset('storage\\localesAdheridos\\'.$localesA->foto_2);
        });


        return response()->json($localesA, 201);

    }
}
