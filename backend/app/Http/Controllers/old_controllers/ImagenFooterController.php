<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
use App\ImagenesFooter;
use Illuminate\Support\Facades\Storage;
use Image;
use Illuminate\Http\Request;

class ImagenFooterController extends Controller {

    public function addImgenes(Request $request) {
        $d = ConfigFooter::first();

        $this->validate($request, [
            'imagen' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
        ], [
            'imagen.image'    => 'La Imagen es requerida',
            'imagen.required' => 'La Imagen es requerida',
            'imagen.mimes'    => 'Solo jpeg, png, bmp,tiff son soportados',
        ]);

        $imagenes = new ImagenesFooter($request->all());

        if (isset($d)) {

            if (! is_null($request->orden)) {

                $d = ImagenesFooter::where('orden', $request->orden)->get();

                if (count($d) > 0) {
                    $response = [
                        'msj' => 'El orden ya se encuentra en la lista, y no se pueden repetir',
                    ];

                    return response()->json($response, 403);
                }
            }

            if (is_null($request->imagen)) {
            } else {
                $originalImage = $request->imagen;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $imagenes->imagen = $nombre_interno;
            }

            $imagenes->save();

            $response = [
                'msj'    => 'Imgenes del Footer Actualizado',
                'imagen' => asset('storage\\imagenFooter\\'.$imagenes->imagen),
            ];

            return response()->json($response, 201);
        }
    }

    public function editar(Request $request, $idImagenFooter) {

        $imagenes = ImagenesFooter::find($idImagenFooter);


        if (! is_null($imagenes)) {

                $d = ImagenesFooter::where('orden', $request->orden)->get();

                if (count($d) > 0 && $d[0]->idImagenFooter != $request->idImagenFooter) {
                    $response = [
                        'msj' => 'El orden ya se encuentra en la lista, y no se pueden repetir',
                    ];

                    return response()->json($response, 403);
                }


            $imagenes->fill($request->all());
            Storage::delete('\\imagenFooter\\'.$imagenes->imagen);

            if (! is_null($request->imagen)) {
                $originalImage = $request->imagen;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = 'png';

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;


                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());
                $imagenes->imagen = $nombre_interno;
            }
            $imagenes->save();

            $response = [
                'msj'    => 'Imgenes del Footer Actualizado',
                'imagen' => asset('storage\\imagenFooter\\'.$imagenes->imagen),
            ];

            return response()->json($response, 201);
        } else {
            $response = [
                'msj' => 'No existe la imágen',
            ];

            return response()->json($response, 404);
        }


    }

    public function borrar($idImagenFooter) {

        $imagenes = ImagenesFooter::find($idImagenFooter);

        if (! is_null($imagenes)) {
            Storage::delete('\\imagenFooter\\'.$imagenes->imagen);
            $imagenes->delete();

            $response = [
                'msj' => 'Se borro la imágen',
            ];

            return response()->json($response, 201);
        } else {
            $response = [
                'msj' => 'No existe la imágen',
            ];

            return response()->json($response, 404);
        }

    }
}
