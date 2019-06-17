<?php

namespace App\Http\Controllers;

use App\Ficha2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Image;

class Ficha2Controller extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            'imagen_para_galeria' => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'fk_ficha1'           => 'required',
        ], [
            'imagen_para_galeria.image'    => 'La Imagen es requerida',
            'imagen_para_galeria.required' => 'La Imagen es requerida',
            'imagen_para_galeria.mimes'    => 'Solo jpeg, png, bmp,tiff son soportados',
            'fk_ficha1.required'           => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $ficha2 = new Ficha2($request->all());

            if (is_null($request->imagen_para_galeria)) {
            } else {
                $originalImage = $request->imagen_para_galeria;

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

            $ficha2->save();
            $response = [
                'msj'  => 'Ficha 2 creada Exitosamente',
                'user' => $ficha2,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en Ficha2Controller: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

}
