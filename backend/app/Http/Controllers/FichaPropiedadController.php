<?php

namespace App\Http\Controllers;

use App\FichaPropiedad;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;
use PDF;
use function view;

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '3000');

class FichaPropiedadController extends Controller {

    public function add(Request $request) {

        $this->validate($request, [
            'titulo'         => 'required',
            'ubicacion'      => 'required',
            'caracteristica' => 'required',
            'valor'          => 'required',
            'comision'       => 'required',
            'img1fa'         => 'required|image|max:10240',
            'img2pr'         => 'required|image|max:10240',
            'img3pl'         => 'image|max:10240',
            'img4pl'         => 'image|max:10240',
            'img5sa'         => 'image|max:10240',
            'img6sa'         => 'image|max:10240',
        ], [
            'titulo.required'         => 'El Campo es requerido',
            'ubicacion.required'      => 'El Campo es requerido',
            'caracteristica.required' => 'El Campo es requerido',
            'valor.required'          => 'El Campo es requerido',
            'comision.required'       => 'El Campo es requerido',
            'img1fa.required'         => 'El Campo es requerido',
            'img2pr.required'         => 'El Campo es requerido',
            'img1fa.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img2pr.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img3pl.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img4pl.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img5sa.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img6sa.max'              => 'El tamaño de la imágen es de maximo 10MB',
        ]);


        DB::beginTransaction();

        try {

            $ficha = new FichaPropiedad($request->all());

            $imgs = [
                'img1fa',
                'img2pr',
                'img3pl',
                'img4pl',
                'img5sa',
                'img6sa',
            ];

            foreach ($imgs as $img) {
                if (! is_null($request[$img])) {

                    $originalImage = $request[$img];

                    $thumbnailImage = Image::make($originalImage);

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\fichaPropiedad\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $ficha[$img] = $nombre_interno;
                }
            }

            $ficha->save();
            $ficha->imagenes = [
                'img1fa' => asset('storage\\fichaPropiedad\\'.@$ficha->img1fa),
                'img2pr' => asset('storage\\fichaPropiedad\\'.@$ficha->img2pr),
                'img3pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img3pl),
                'img4pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img4pl),
                'img5sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img5sa),
                'img6sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img6sa),
            ];
            $response        = [
                'msj'   => 'Ficha de la fichaPropiedad creada exitosamente',
                'ficha' => $ficha,
            ];
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en FichaPropiedadController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function edit(Request $request, $idFichas) {
        //return response()->json($request->all());

        $this->validate($request, [
            'titulo'         => 'required',
            'ubicacion'      => 'required',
            'caracteristica' => 'required',
            'valor'          => 'required',
            'comision'       => 'required',
            'img1fa'         => 'image|max:10240',
            'img2pr'         => 'image|max:10240',
            'img3pl'         => 'image|max:10240',
            'img4pl'         => 'image|max:10240',
            'img5sa'         => 'image|max:10240',
            'img6sa'         => 'image|max:10240',
            //'fk_idPropiedad'    => 'required',
        ], [
            'titulo.required'         => 'El Campo es requerido',
            'ubicacion.required'      => 'El Campo es requerido',
            'caracteristica.required' => 'El Campo es requerido',
            'valor.required'          => 'El Campo es requerido',
            'comision.required'       => 'El Campo es requerido',
            'img1fa.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img2pr.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img3pl.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img4pl.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img5sa.max'              => 'El tamaño de la imágen es de maximo 10MB',
            'img6sa.max'              => 'El tamaño de la imágen es de maximo 10MB',
            //'fk_idPropiedad.required'    => 'El Campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $fichaPropiedad = FichaPropiedad::find($idFichas);
            $fichaPropiedad->fill($request->all());

            if (! is_null($fichaPropiedad)) {

                $imgs = [
                    'img1fa',
                    'img2pr',
                    'img3pl',
                    'img4pl',
                    'img5sa',
                    'img6sa',
                ];

                foreach ($imgs as $img) {
                    if (is_null($request[$img])) {
                    } else {

                        $originalImage = $request[$img];

                        $thumbnailImage = Image::make($originalImage);

                        $nombre_publico = $originalImage->getClientOriginalName();
                        $extension      = $originalImage->getClientOriginalExtension();

                        $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                        $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                        Storage::disk('local')->put('\\fichaPropiedad\\'.$nombre_interno, (string) $thumbnailImage->encode());

                        $fichaPropiedad[$img] = $nombre_interno;
                    }
                }

                $fichaPropiedad->save();
                $fichaPropiedad->imagenes = [
                    'img1fa' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img1fa),
                    'img2pr' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img2pr),
                    'img3pl' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img3pl),
                    'img4pl' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img4pl),
                    'img5sa' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img5sa),
                    'img6sa' => asset('storage\\fichaPropiedad\\'.@$fichaPropiedad->img6sa),
                ];

                $response = [
                    'msj'   => 'Actualizada Exitosamente',
                    'ficha' => [
                        $fichaPropiedad,
                    ],
                ];
                DB::commit();

                return response()->json($response, 201);
            } else {
                $response = [
                    'msj' => 'No existe dicha ficha',
                ];

                return response()->json($response, 404);
            }
        } catch (Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en FichaPropiedadController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function delete($idFichas) {
        $fichaPropiedad = FichaPropiedad::find($idFichas);
        if (! is_null($fichaPropiedad)) {
            $fichaPropiedad->delete(); //se le asigna la fecha de borrado
            $response = [
                'msj' => 'Ficha borrada Exitosamente',
            ];

            return response()->json($response, 201);
        } else {
            $response = [
                'msj' => 'No existe la Ficha',
            ];

            return response()->json($response, 200);
        }
    }

    public function listarTodo() {

        $fichas = FichaPropiedad::get();

        if (count($fichas) > 0) {
            foreach ($fichas as $key => $ficha) {
                $fichas[$key]['imagenes'] = [
                    'img1fa' => asset('storage\\fichaPropiedad\\'.@$ficha->img1fa),
                    'img2pr' => asset('storage\\fichaPropiedad\\'.@$ficha->img2pr),
                    'img3pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img3pl),
                    'img4pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img4pl),
                    'img5sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img5sa),
                    'img6sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img6sa),
                ];
            }

            return response()->json($fichas, 200);
        } else {
            $response = [
                'msj' => 'No existen fichas que mostrar',
            ];

            return response()->json($response, 200);
        }
    }

    public function listarPorId($idFicha) {
        $ficha = FichaPropiedad::find($idFicha);

        if (isset($ficha)) {
            $ficha->imagenes = [
                'img1fa' => asset('storage\\fichaPropiedad\\'.@$ficha->img1fa),
                'img2pr' => asset('storage\\fichaPropiedad\\'.@$ficha->img2pr),
                'img3pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img3pl),
                'img4pl' => asset('storage\\fichaPropiedad\\'.@$ficha->img4pl),
                'img5sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img5sa),
                'img6sa' => asset('storage\\fichaPropiedad\\'.@$ficha->img6sa),
            ];

            return response()->json($ficha, 200);
        } else {
            $response = [
                'msj' => 'No existe dicha ficha',
            ];

            return response()->json($response, 404);
        }
    }

    public function pdf($idFicha = false) {
        $data = FichaPropiedad::with('propiedad')->find($idFicha);

        if ($idFicha == false || is_null($data)) {
            $response = [
                'msj' => 'Debe pasar algun id de la ficha valido',
            ];

            return response()->json($response, 404);
        }
        //return view('pedidos')->with([ 'ficha' => $data ]);
        $pdf = PDF::loadView('pedidos', [ 'ficha' => $data ]);

        return $pdf->download($data->idFichas.'.pdf');
    }
}
