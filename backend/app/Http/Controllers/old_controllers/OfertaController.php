<?php

namespace App\Http\Controllers;

use App\Oferta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;
use App\Producto;

class OfertaController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $o = Oferta::orderby('idOferta', 'desc')->get();
        
        $o->each(function($o) {
            $o->set_imagen = asset('storage\\oferta\\'.$o->imagen);
        });
        
        $o->each(function($o){
            $o->nombreProducto = $o->producto->nombre;
        });

        return $o;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {


        $this->validate($request, [
            'titulo'     => 'required',
            'tiempoExpi' => 'required',
            'status'     => 'required',
            'imagen'     => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'titulo.required'     => 'El Título es requerido',
            'tiempoExpi.required' => 'El Tiempo de expiracion es requerido',
            'status.required'     => 'El Status es requerido',
            'imagen.image'        => 'La Imagen es requerida',
            'imagen.required'     => 'La Imagen es requerida',
            'imagen.mimes'        => 'Solo jpeg, png, bmp,tiff son soportados',

        ]);

        DB::beginTransaction();

        try {

            $oferta = new Oferta($request->all());

                /*para la foto*/
                $originalImage = $request->imagen;


                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(1230, 512, function($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();
                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\oferta\\'.$nombre_interno, (string) $thumbnailImage->encode());
                /*para la foto*/

                $oferta->imagen = $nombre_interno;


            $oferta->save();

            $response = [
                'msj'         => 'Oferta Creada',
                'ruta_imagen' => asset('storage\\oferta\\'.$oferta->imagen),
                'oferta'      => $oferta,
            ];
            DB::commit();


            return response()->json($response, 201);

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en UserController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        try {

            $oferta = Oferta::findOrFail($id);

            $response = [
                'msj'    => 'Info de la oferta',
                'oferta' => $oferta,
            ];

            return response()->json($response, 200);

        } catch (\Exception $e) {
            Log::error('Ha ocurrido un error en OfertaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
            ], 500);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $this->validate($request, [
            'titulo'     => 'required',
            'tiempoExpi' => 'required',
            'status'     => 'required',
            //'imagen'     => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'titulo.required'     => 'El Título es requerido',
            'tiempoExpi.required' => 'El Tiempo de expiracion es requerido',
            'status.required'     => 'El Status es requerido',
            //'imagen.required'     => 'La Imagen es requerida',

        ]);

        DB::beginTransaction();

        try {
            $oferta = Oferta::findOrFail($id);

            $oferta->fill($request->all());

            if (is_null($request->imagen)) {

            } else {

                /*para la foto*/
                $originalImage = $request->imagen;


                $thumbnailImage = Image::make($originalImage);
                $thumbnailImage->fit(1230, 512, function($constraint) {
                    $constraint->aspectRatio();
                });
                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();
                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                Storage::disk('local')->put('\\oferta\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $oferta->imagen = $nombre_interno;
                /*para la foto*/
            }


            $response = [
                'msj'    => 'Info de la oferta actulizada',
                'oferta' => $oferta,
            ];


            $oferta->save();
            DB::commit();

            return response()->json($response, 200);

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en OfertaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {

        DB::beginTransaction();

        try {
            $oferta = Oferta::findOrFail($id);
            $oferta->delete();

            $response = [
                'msj'    => 'Oferta eliminado Correctamente',
                'oferta' => $oferta,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en OfertaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function getImagenOferta($archivo) {

        if (Storage::exists('\\oferta\\'.$archivo)) {

            /* habilitar si quieres recibir la imagen en streaming  */
            return Storage::response("oferta\\".$archivo);

            //return response()->json(Storage::url('galeri/'.$archivo), 201);
        } else {
            return response()->json('Archivo no encontrado', 404);
        }
    }

}
