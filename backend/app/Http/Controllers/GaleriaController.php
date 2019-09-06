<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
use App\Galeria;
use App\ImagenGaleria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

// use Image;

class GaleriaController extends Controller
{
    /*Creado por Breiddy Monterrey*/
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'           => 'required|min:2',
            'descripcion'      => 'required|min:2',
            'fk_publicaciones' => 'required|min:1',

        ], [
            'titulo.required'           => 'El título es requerido',
            'titulo.min'                => 'El título no puede tener menos de 2 caracteres',
            'descripcion.required'      => 'El descripción teléfono es requerido',
            'descripcion.min'           => 'El descripción de teléfono no puede tener menos de 2 caracteres',
            'fk_publicaciones.required' => 'La publicacion es requerida',
            'fk_publicaciones.min'      => 'La publicacion no puede tener menos de 2 caracteres',
        ]);

        try {

            $galeria = new Galeria($request->all());
            $galeria->save();
            if (!is_null($request->images)) {
                foreach ($request->images as $img) {
                    $originalImage  = $img;
                    $thumbnailImage = Image::make($originalImage);

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();
                    $nombre_interno = str_replace('.' . $extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-') . '-' . time() . '-' . strval(rand(100, 999)) . '.' . $extension;
                    Storage::disk('local')->put('\\imagenesDeGaleria\\' . $nombre_interno, (string) $thumbnailImage->encode());
                    ImagenGaleria::create([
                        'imagen'       => asset('storage\\imagenesDeGaleria\\'.$nombre_interno),
                        'fk_idGaleria' => $galeria->idGaleria,
                    ]);
                }
            }

            $galeria->imagenes; //para listar las imagenes

            DB::commit();
            $response = [
                'msj'  => 'Galeria Creada Exitosamente',
                'data' => $galeria,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en TransaccionesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function listaGaleria()
    {

        $galeria  = Galeria::with('imagenes')->get();
        $response = [
            'msj'  => 'Galerias',
            'data' => $galeria,
        ];

        return response()->json($response, 200);
    }

    public function listarGaleriaPorId($id)
    {

        $galeria = Galeria::find($id);

        if ($galeria == null) {

            $response = [
                'message' => 'No existe galeria',
            ];
        } else {
            $response = [
                'msj'     => 'Galeria',
                'Galeria' => $galeria,
            ];
        }

        return response()->json($response, 200);
    }

    public function update(Request $request, $idGaleria)
    {
        //return response()->json(['request'=>$request->all(),'images'=>$request->images]);
        DB::beginTransaction();
        try {

            $galeria = Galeria::findOrFail($idGaleria);
            $galeria->fill($request->all());

            if (!is_null($request->images)) {
                foreach ($request->images as $img) {
                    $originalImage  = $img;
                    $thumbnailImage = Image::make($originalImage);

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();
                    $nombre_interno = str_replace('.' . $extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-') . '-' . time() . '-' . strval(rand(100, 999)) . '.' . $extension;
                    Storage::disk('local')->put('\\imagenesDeGaleria\\' . $nombre_interno, (string) $thumbnailImage->encode());
                    ImagenGaleria::create([
                        'imagen'       => asset('storage\\imagenesDeGaleria\\'.$nombre_interno),
                        'fk_idGaleria' => $idGaleria,
                    ]);
                }
            }

            $galeria->save();

            $response = [
                'msj'  => 'Galeria actualizada exitosamente',
                'data' => $galeria,
            ];

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();

            Log::error('Ha ocurrido un error en GaleriaController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function destroy($idGaleria)
    {

        DB::beginTransaction();

        try {
            $galeria = Galeria::find($idGaleria);

            if (is_null($galeria)) {

                $response = [
                    'message' => 'Galeria no existe',
                ];

                return response()->json($response, 401);
            }

            $galeria->delete();
            $response = [
                'message' => 'Galeria eliminada correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en SucursalController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }
}
