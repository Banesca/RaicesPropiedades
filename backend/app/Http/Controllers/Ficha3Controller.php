<?php

namespace App\Http\Controllers;

use App\Galeria;
use App\Propiedad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;
use const false;
use function count;
use function is_null;
use function response;

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '3000');

class Ficha3Controller extends Controller {

    public function add(Request $request) {
        if ($request->exists('Direccion_Numero') && $request->Direccion_Numero != '' && ! is_null($request->Direccion_Numero)) {
            $this->validate($request, [
                'imagen1'             => 'image|max:10240',
                'imagen2'             => 'image|max:10240',
                'imagen3'             => 'image|max:10240',
                'imagen4'             => 'image|max:10240',
                'imagen5'             => 'image|max:10240',
                'imagen6'             => 'image|max:10240',
                'imagen7'             => 'image|max:10240',
                'imagen8'             => 'image|max:10240',
                'imagen9'             => 'image|max:10240',
                'imagen_para_galeria' => 'image|max:10240',
                'Direccion_Numero'    => 'integer',
            ], [
                'imagen1.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen2.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen3.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen4.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen5.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen6.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen7.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen8.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen9.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen_para_galeria.max'  => 'El tamaño de la imágen es de maximo 10MB',
                'Direccion_Numero.integer' => 'El campo solo acepta números',
            ]);

        } else {
            $this->validate($request, [
                'imagen1'             => 'image|max:10240',
                'imagen2'             => 'image|max:10240',
                'imagen3'             => 'image|max:10240',
                'imagen4'             => 'image|max:10240',
                'imagen5'             => 'image|max:10240',
                'imagen6'             => 'image|max:10240',
                'imagen7'             => 'image|max:10240',
                'imagen8'             => 'image|max:10240',
                'imagen9'             => 'image|max:10240',
                'imagen_para_galeria' => 'image|max:10240',

            ], [
                'imagen1.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen2.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen3.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen4.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen5.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen6.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen7.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen8.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen9.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen_para_galeria.max' => 'El tamaño de la imágen es de maximo 10MB',

            ]);

        }

        if ($request->fk_idTipoPropiedad == 8) {
            $this->validate($request, [
                'SuperficieTotal' => 'required',

            ], [
                'SuperficieTotal.required' => 'EL campo SuperficieTotal es Obligatorio',
            ]);
        }
        DB::beginTransaction();

        try {

            $propiedad = new Propiedad($request->all());

            if ($request->boolCalleMod) {
                $propiedad->boolCalleMod = 1;
            } else {
                $propiedad->boolCalleMod = 0;
            }
            //dd($propiedad);
            //return response()->json($propiedad);
            //exit();

            $imgs = [
                'imagen1',
                'imagen2',
                'imagen3',
                'imagen4',
                'imagen5',
                'imagen6',
                'imagen7',
                'imagen8',
                'imagen9',
                'imagen_para_galeria',
            ];


            foreach ($imgs as $img) {
                if (is_null($request[$img])) {
                } else {
                    $originalImage = $request[$img];

                    $thumbnailImage = Image::make($originalImage);

                    /*$thumbnailImage->fit(2048, 2048, function($constraint) {
                        $constraint->aspectRatio();
                    });*/

                    @$thumbnailImage->orientate();

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\ficha2\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $propiedad[$img] = $nombre_interno;
                }
            }

            $propiedad->save();

            //Mail::to($request->user()->email)->send(new PropiedadMail($request->user()->email, $propiedad->descipcion, $propiedad->idPropiedad));

            $sincronice = new SincroniceArgenController();
            //return response()->json($sincronice->add($propiedad), 201);
            //$sincronice->add($propiedad);


            $bol = $sincronice->add($propiedad);
            //return response()->json($bol, 404);
            if (! $bol) {
                $propiedad->update([ 'estaSincConArgen' => false ]);
                //return response()->json([
                //    'message'  => $bol['msj'],
                //], 500);
            }
            if ($request->fk_estado_publicacion == 2) {
                SincroniceArgenController::suspender($propiedad->idPropiedad);
            }
            /*REGISTRANDO EN GALERIA*/
            if ($propiedad->aparece_en_galeria == 1 && $request->exists('imagen_para_galeria')) {
                $r = new GaleriaController();
                $r->store(new Request([
                    'titulo'           => $request->titulo,
                    'descripcion'      => $request->descipcion,
                    'fk_publicaciones' => $propiedad->idPropiedad,
                    'images'           => [ $request->imagen_para_galeria ],
                ]));
            }
            /*return response()->json($r);
            exit();*/
            /*REGISTRANDO EN GALERIA*/

            @$propiedad->TipoPropiedad;
            @$propiedad->Disposicion;
            @$propiedad->Estado;
            @$propiedad->Orientacion;
            @$propiedad->TipoAcceso;
            @$propiedad->TipoAscensor;
            @$propiedad->TipoBalcon;
            @$propiedad->TipoBano;
            @$propiedad->TipoCalefaccion;
            @$propiedad->TipoCampo;
            @$propiedad->TipoCobertura;
            @$propiedad->TipoCoche;
            @$propiedad->TipoCochera;
            @$propiedad->TipoCosta;
            @$propiedad->TipoEdificio;
            @$propiedad->TipoExpensas;
            @$propiedad->TipoFondoComercio;
            @$propiedad->TipoFrente;
            @$propiedad->TipoHotel;
            @$propiedad->TipoLocal;
            @$propiedad->TipoPendiente;
            @$propiedad->TipoPiso;
            @$propiedad->TipoPorton;
            @$propiedad->TipoTecho;
            @$propiedad->TipoTechoIndustrial;
            @$propiedad->TipoTerreno;
            @$propiedad->TipoUnidad;
            @$propiedad->TipoVista;
            @$propiedad->estadoPublicacion;
            @$propiedad->tipoOpeacion;
            @$propiedad->tipoMoneda;

            //$ficha123 = Ficha123::where('fk_idFicha2', $request->fk_ficha2)->first();
            // $ficha123->update([ 'fk_idFicha3' => $propiedad->idPropiedad ]);

            $response = [
                'msj'             => 'Creada Exitosamente',
                'imagenes'        => [
                    'imagen1'             => asset('storage\\ficha2\\'.@$propiedad->imagen1),
                    'imagen2'             => asset('storage\\ficha2\\'.@$propiedad->imagen2),
                    'imagen3'             => asset('storage\\ficha2\\'.@$propiedad->imagen3),
                    'imagen4'             => asset('storage\\ficha2\\'.@$propiedad->imagen4),
                    'imagen5'             => asset('storage\\ficha2\\'.@$propiedad->imagen5),
                    'imagen6'             => asset('storage\\ficha2\\'.@$propiedad->imagen6),
                    'imagen7'             => asset('storage\\ficha2\\'.@$propiedad->imagen7),
                    'imagen8'             => asset('storage\\ficha2\\'.@$propiedad->imagen8),
                    'imagen9'             => asset('storage\\ficha2\\'.@$propiedad->imagen9),
                    'imagen_para_galeria' => asset('storage\\ficha2\\'.@$propiedad->imagen_para_galeria),
                ],
                'datos_propiedad' => [
                    $propiedad,
                ],
            ];
            DB::commit();


            return response()->json($response, 201);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en PropiedadController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message'  => 'Ha ocurrido un error al tratar de guardar los datos.',
                'message1' => $e->getMessage(),
                'linea'    => $e->getLine(),
            ], 500);
        }
    }

    public function edit(Request $request, $idPropiedad) {
        if ($request->exists('Direccion_Numero') && $request->Direccion_Numero != '' && ! is_null($request->Direccion_Numero)) {

            $this->validate($request, [
                'imagen1'             => 'image|max:10240',
                'imagen2'             => 'image|max:10240',
                'imagen3'             => 'image|max:10240',
                'imagen4'             => 'image|max:10240',
                'imagen5'             => 'image|max:10240',
                'imagen6'             => 'image|max:10240',
                'imagen7'             => 'image|max:10240',
                'imagen8'             => 'image|max:10240',
                'imagen9'             => 'image|max:10240',
                'imagen_para_galeria' => 'image|max:10240',
                'Direccion_Numero'    => 'integer',
            ], [
                'imagen1.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen2.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen3.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen4.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen5.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen6.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen7.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen8.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen9.max'              => 'El tamaño de la imágen es de maximo 10MB',
                'imagen_para_galeria.max'  => 'El tamaño de la imágen es de maximo 10MB',
                'Direccion_Numero.integer' => 'El campo solo acepta números',
            ]);
        } else {
            $this->validate($request, [
                'imagen1'             => 'image|max:10240',
                'imagen2'             => 'image|max:10240',
                'imagen3'             => 'image|max:10240',
                'imagen4'             => 'image|max:10240',
                'imagen5'             => 'image|max:10240',
                'imagen6'             => 'image|max:10240',
                'imagen7'             => 'image|max:10240',
                'imagen8'             => 'image|max:10240',
                'imagen9'             => 'image|max:10240',
                'imagen_para_galeria' => 'image|max:10240',
                //'Direccion_Numero'    => 'integer',
            ], [
                'imagen1.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen2.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen3.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen4.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen5.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen6.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen7.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen8.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen9.max'             => 'El tamaño de la imágen es de maximo 10MB',
                'imagen_para_galeria.max' => 'El tamaño de la imágen es de maximo 10MB',
                //'Direccion_Numero.integer' => 'El campo solo acepta números',
            ]);
        }

        if ($request->fk_idTipoPropiedad == 8) {
            $this->validate($request, [
                'SuperficieTotal' => 'required',

            ], [
                'SuperficieTotal.required' => 'EL campo SuperficieTotal es Obligatorio',
            ]);
        }

        DB::beginTransaction();

        try {

            $propiedad = Propiedad::find($idPropiedad);

            $propiedad->fill($request->all());
            if ($request->boolCalleMod) {
                $propiedad->boolCalleMod = 1;
            } else {
                $propiedad->boolCalleMod = 0;
            }

            if (! is_null($propiedad)) {

                $imgs = [
                    'imagen1',
                    'imagen2',
                    'imagen3',
                    'imagen4',
                    'imagen5',
                    'imagen6',
                    'imagen7',
                    'imagen8',
                    'imagen9',
                    'imagen_para_galeria',
                ];


                foreach ($imgs as $img) {
                    if (is_null($request[$img])) {
                    } else {
                        $originalImage = $request[$img];

                        $thumbnailImage = Image::make($originalImage);

                        /*$thumbnailImage->fit(2048, 2048, function($constraint) {
                            $constraint->aspectRatio();
                        });*/
                        @$thumbnailImage->orientate();
                        $nombre_publico = $originalImage->getClientOriginalName();
                        $extension      = $originalImage->getClientOriginalExtension();

                        $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                        $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                        Storage::disk('local')->put('\\ficha2\\'.$nombre_interno, (string) $thumbnailImage->encode());

                        $propiedad[$img] = $nombre_interno;
                    }

                }

                $propiedad->save();
                /*Aqui sincronizo de nuevo la propiedad*/
                $sincronice = new SincroniceArgenController();
                //return response()->json($sincronice->add($propiedad)); //para add propiedad en argen pro
                $sincronice->add($propiedad); //para edit propiedad en argen pro
                // $bol=$sincronice->add($propiedad); //para edit propiedad en argen pro
                // if (!$bol['bol']) {
                //     return response()->json([
                //         'message'  => $bol['msj'],
                //     ], 500);
                // }



                if ($request->fk_estado_publicacion == 2) {
                    SincroniceArgenController::suspender($idPropiedad);
                }


                /*REGISTRANDO EN GALERIA*/
                if ($request->aparece_en_galeria == 1 && $request->exists('imagen_para_galeria')) {
                    $idGaleria = Galeria::where('fk_publicaciones', $propiedad->idPropiedad)->get();
                    $r         = new GaleriaController();

                    if (count($idGaleria) > 0) {
                        $r->update(new Request([
                            'titulo'           => $request->titulo,
                            'descripcion'      => $request->descipcion,
                            'fk_publicaciones' => $propiedad->idPropiedad,
                            'images'           => [ $request->imagen_para_galeria ],
                        ]), $idGaleria[0]->idGaleria);
                    } else {
                        $r->store(new Request([
                            'titulo'           => $request->titulo,
                            'descripcion'      => $request->descipcion,
                            'fk_publicaciones' => $propiedad->idPropiedad,
                            'images'           => [ $request->imagen_para_galeria ],
                        ]));
                    }

                }

                @$propiedad->TipoPropiedad;
                @$propiedad->Disposicion;
                @$propiedad->Estado;
                @$propiedad->Orientacion;
                @$propiedad->TipoAcceso;
                @$propiedad->TipoAscensor;
                @$propiedad->TipoBalcon;
                @$propiedad->TipoBano;
                @$propiedad->TipoCalefaccion;
                @$propiedad->TipoCampo;
                @$propiedad->TipoCobertura;
                @$propiedad->TipoCoche;
                @$propiedad->TipoCochera;
                @$propiedad->TipoCosta;
                @$propiedad->TipoEdificio;
                @$propiedad->TipoExpensas;
                @$propiedad->TipoFondoComercio;
                @$propiedad->TipoFrente;
                @$propiedad->TipoHotel;
                @$propiedad->TipoLocal;
                @$propiedad->TipoPendiente;
                @$propiedad->TipoPiso;
                @$propiedad->TipoPorton;
                @$propiedad->TipoTecho;
                @$propiedad->TipoTechoIndustrial;
                @$propiedad->TipoTerreno;
                @$propiedad->TipoUnidad;
                @$propiedad->TipoVista;
                @$propiedad->estadoPublicacion;
                @$propiedad->tipoOpeacion;
                @$propiedad->tipoMoneda;

                $response = [
                    'msj'             => 'Actualizada Exitosamente',
                    'imagenes'        => [
                        'imagen1'             => asset('storage\\ficha2\\'.@$propiedad->imagen1),
                        'imagen2'             => asset('storage\\ficha2\\'.@$propiedad->imagen2),
                        'imagen3'             => asset('storage\\ficha2\\'.@$propiedad->imagen3),
                        'imagen4'             => asset('storage\\ficha2\\'.@$propiedad->imagen4),
                        'imagen5'             => asset('storage\\ficha2\\'.@$propiedad->imagen5),
                        'imagen6'             => asset('storage\\ficha2\\'.@$propiedad->imagen6),
                        'imagen7'             => asset('storage\\ficha2\\'.@$propiedad->imagen7),
                        'imagen8'             => asset('storage\\ficha2\\'.@$propiedad->imagen8),
                        'imagen9'             => asset('storage\\ficha2\\'.@$propiedad->imagen9),
                        'imagen_para_galeria' => asset('storage\\ficha2\\'.@$propiedad->imagen_para_galeria),
                    ],
                    'datos_propiedad' => [
                        $propiedad,
                    ],
                ];
                DB::commit();

                return response()->json($response, 201);

            } else {
                $response = [
                    'msj' => 'No existe dicha propiedad',
                ];

                return response()->json($response, 404);
            }

        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PropiedadController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function delete($idPropiedad) {
        $propiedad = Propiedad::find($idPropiedad);
        if (! is_null($propiedad)) {
            $propiedad->update([ 'fk_estado_publicacion' => 3 ]);  //se cambia de estatus
            //$propiedad->delete(); //se le asiga la fehca de borrado
            $respuestaArgen = SincroniceArgenController::darDeBaja($propiedad->idPropiedad);
            //return response()->json($respuestaArgen);

            /*if ($respuestaArgen == true) {
                Log::info('Se ha desactivado correctamente en ArgenPro la propiedad idPropiedad: '.$propiedad->idPropiedad);
            } else {
                Log::error('Ha ocurrido un error en al desactivar la propiedad en ArgenPro: idPropiedad: '.$propiedad->idPropiedad);
            }*/

            $response = [
                'msj' => 'Propiedad borrada Exitosamente',
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }

    }

    public function deleteSinRetorno($idPropiedad) {
        $propiedad = Propiedad::find($idPropiedad);
        if (! is_null($propiedad)) {
            $propiedad->delete(); //se le asiga la fehca de borrado
            $response = [
                'msj' => 'Propiedad borrada Exitosamente',
            ];

            return response()->json($response, 201);
        } else {
            $response = [
                'msj' => 'No existe la propiedad',
            ];

            return response()->json($response, 200);
        }

    }

    public function listPropiedadesBorradas() {
        $response = [
            'msj' => 'No hay propiedades borradas',
        ];

        return response()->json(count($p = Propiedad::where('fk_estado_publicacion', 3)->with(
            'TipoPropiedad',
            'Disposicion',
            'Estado',
            'Orientacion',
            'TipoAcceso',
            'TipoAscensor',
            'TipoBalcon',
            'TipoBano',
            'TipoCalefaccion',
            'TipoCampo',
            'TipoCobertura',
            'TipoCoche',
            'TipoCochera',
            'TipoCosta',
            'TipoEdificio',
            'TipoExpensas',
            'TipoFondoComercio',
            'TipoFrente',
            'TipoHotel',
            'TipoLocal',
            'TipoPendiente',
            'TipoPiso',
            'TipoPorton',
            'TipoTecho',
            'TipoTechoIndustrial',
            'TipoTerreno',
            'TipoUnidadCasa',
            'TipoUnidadDepartamento',
            'Barrio',
            'Localidad',
            'Pais',
            'Partido',
            'Provincia',
            'SubBarrio',
            'Region',
            'TipoVista',
            'estadoPublicacion',
            'tipoOpeacion',
            'tipoMoneda'
        )->get()) > 0 ? $p : $response);
    }

    public function recuperarPropiedadBorra($idPropiedad) {
        $response = [
            'msj' => 'Error, La propiedad que intenta recuperar no esta borrada',
        ];
        ! is_null($a = @Propiedad::onlyTrashed()->find($idPropiedad)) //primero busco si esta la propiedad como eliminada
            ?
            $a->restore() && $p = $this->printerr('Recuperada exitosamente') //si está, entonces la recupero y construyo el mensaje
            :
            $p = $this->printerr('No existe como eliminada'); //si no, construyo el mensaje de error

        return $p;
    }

    public function printerr($msj) {
        $response = [
            'msj' => 'Propiedad '.$msj,
        ];

        return $response;
    }

}
