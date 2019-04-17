<?php

namespace App\Http\Controllers;

use Faker\Provider\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

use App\GaleriaHome;


class GaleriaHomeController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

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


        try {

            if ($request->user()->fk_idPerfil == 1) {

                $this->validate($request, [
                    'filename' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
                ], [
                    'image.required'        => 'La imagen es requerida',
                ]);


                $originalImage = $request->filename;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });


                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;


                Storage::disk('local')->put('\\galeri\\'.$nombre_interno, (string) $thumbnailImage->encode());


                $imagemodel         = new GaleriaHome();
                $imagemodel->titulo = $nombre_interno;
                $imagemodel->save();

                $response = [
                    'msj'         => 'Imagen guardada exitosamente',
                    'id_dataBase' => $imagemodel->idGaleriaHome,
                    'calidad'     => '2048*2048',
                    'size'        => $size = (Storage::size('\\galeri\\'.$nombre_interno) / 1000000).' Mb',
                    'name'        => '/galeri/'.$nombre_interno,
                ];

                return response()->json($response, 201);

            } else {
                response()->json('Su usuario no es administrador', 400);
            }

        } catch (\Exception $e) {
            Log::error('Ha ocurrido un error en GaleriaHomeController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de obtener los datos.',
            ], 500);
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($archivo) {

    }

    public function getgaleriaHome($archivo) {

        if (Storage::exists('\\galeri\\'.$archivo)) {

            /* habilitar si quieres recibir la imagen en streaming  */
            return Storage::response("galeri\\".$archivo);

            //return response()->json(Storage::url('galeri/'.$archivo), 201);
        } else {
            return response()->json('Archivo no encontrado', 404);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($archivo) {

        if (Storage::exists('\\galeri\\'.$archivo)) {
            Storage::delete('\\galeri\\'.$archivo);

            $ima = GaleriaHome::where('titulo', $archivo)->delete();

            return response()->json('Borrado Exitosamente', 201);
        } else {
            return response()->json('Archivo no encontrado', 404);
        }
    }
}
