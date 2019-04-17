<?php

namespace App\Http\Controllers;

use App\ConfigFooter;
use App\ImagenesFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;

class ConfigFooterController extends Controller {
    public function getInfo() {

        $c                                 = ConfigFooter::first();
        $c->set_imagen_img_como_comprar    = asset('storage\\imagenFooter\\'.@$c->img_como_comprar);
        $c->set_imagen_img_HOME            = asset('storage\\imagenFooter\\'.@$c->img_HOME);
        $c->set_imagen_img_OFERTA          = asset('storage\\imagenFooter\\'.@$c->img_OFERTA);
        $c->set_imagen_img_BLOG            = asset('storage\\imagenFooter\\'.@$c->img_BLOG);
        $c->set_imagen_img_logo            = asset('storage\\imagenFooter\\'.@$c->img_logo);
        $c->set_imagen_img_seccionDelivery = asset('storage\\imagenFooter\\'.@$c->img_seccionDelivery);
        $c->set_imagen_img_novedades       = asset('storage\\imagenFooter\\'.@$c->img_novedades);
        $c->set_imagen_img_mapa            = asset('storage\\imagenFooter\\'.@$c->img_mapa);
        $c->set_imagen_img_recomprar       = asset('storage\\imagenFooter\\'.@$c->img_recomprar);

        if (is_null($c)) {
            $response = [
                'msj' => 'No se han configurado los parámetros generales',
            ];

            return response()->json($response, 404);
        }

        $imagenes = ImagenesFooter::whereNotNull('orden')->orderBy('orden', 'ASC')->get();

        //$destacados = Destacado::whereNotNull('orden')->orderBy('orden', 'ASC')->get();
        $imagenes->each(function($imagenes) {
            $imagenes->imagen = asset('storage\\imagenFooter\\'.$imagenes->imagen);

            return $imagenes;
        });

        $de = [];
        foreach ($imagenes as $key => $imageness) {
            array_push($de, $imageness);
        }

        $imagenes = ImagenesFooter::whereNull('orden')->orderBy('orden', 'ASC')->get();
        $imagenes->each(function($imagenes) {
            $imagenes->imagen = asset('storage\\imagenFooter\\'.$imagenes->imagen);

            return $imagenes;
        });

        foreach ($imagenes as $key => $imageness) {
            array_push($de, $imageness);
        }

        $c->imagenes = $de;

        return response()->json($c);
    }

    public function updateInfo(Request $request) {
        // Como se supone que estamos editanto,
        // vamos a dejar el unico registro
        // para editar

        $d = ConfigFooter::first();

        if (empty($d)) { // Caso de estar vacio

            $this->validate($request, [
                'direccion'            => 'required',
                'nroContacto'          => 'required',
                'mail1'                => 'required|email',
                //'mail2'       => 'required',
                'latitud'              => 'required',
                'longitud'             => 'required',
                'whatsApp1'            => 'required',
                //'whatsApp2'   => 'required',
                //'horarios'    => 'required',
                //'subtes'      => 'required',
                //'colectivos'  => 'required',
                //'avenidas'    => 'required',
                //'listaPrecio' => 'required|integer|between:1,9',
                'reservaMercaderiaHrs' => 'required',
            ], [
                'direccion.required'            => 'El campo es requerido',
                'nroContacto.required'          => 'El campo es requerido',
                'mail1.required'                => 'El campo es requerido',
                'mail1.email'                   => 'El campo no tiene el formado de correo valido',
                //'mail2.required'       => 'El campo es requerido',
                'latitud.required'              => 'El campo es requerido',
                'longitud.required'             => 'El campo es requerido',
                'whatsApp1.required'            => 'El campo es requerido',
                //'whatsApp2.required'   => 'El campo es requerido',
                //'horarios.required'    => 'El campo es requerido',
                //'subtes.required'      => 'El campo es requerido',
                //'colectivos.required'  => 'El campo es requerido',
                //'avenidas.required'    => 'El campo es requerido',
                //'listaPrecio.between'  => 'El rango para la lista de precios es :min - :max',
                'reservaMercaderiaHrs.required' => 'El campo es requerido',

            ]);

            $c = new ConfigFooter($request->all());

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

                $c->imagen = $nombre_interno;
            }

            if (is_null($request->img_HOME)) {
            } else {
                $originalImage = $request->img_HOME;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_HOME = $nombre_interno;
            }

            if (is_null($request->img_OFERTA)) {
            } else {
                $originalImage = $request->img_OFERTA;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_OFERTA = $nombre_interno;
            }

            if (is_null($request->img_BLOG)) {
            } else {
                $originalImage = $request->img_BLOG;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_BLOG = $nombre_interno;
            }

            if (is_null($request->img_como_comprar)) {
            } else {
                $originalImage = $request->img_como_comprar;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_como_comprar = $nombre_interno;
            }

            if (is_null($request->img_logo)) {
            } else {
                $originalImage = $request->img_logo;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(350, 110, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_logo = $nombre_interno;
            }

            if (is_null($request->img_seccionDelivery)) {
            } else {
                $originalImage = $request->img_seccionDelivery;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_seccionDelivery = $nombre_interno;
            }

            if (is_null($request->img_novedades)) {
            } else {
                $originalImage = $request->img_novedades;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_novedades = $nombre_interno;
            }

            if (is_null($request->img_mapa)) {
            } else {
                $originalImage = $request->img_mapa;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_mapa = $nombre_interno;
            }

            if (is_null($request->img_recomprar)) {
            } else {
                $originalImage = $request->img_recomprar;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $c->img_recomprar = $nombre_interno;
            }

            $c->save();
            $response = [
                'msj'        => 'Footer Creado',
                'set_imagen' => asset('storage\\imagenFooter\\'.$c->imagen),
            ];

            return response()->json($response, 201);
        } else {
            $d->direccion   = $request->direccion;
            $d->nroContacto = $request->nroContacto;
            $d->mail1       = $request->mail1;
            $d->mail2       = $request->mail2;
            $d->latitud     = $request->latitud;
            $d->longitud    = $request->longitud;
            $d->whatsApp1   = $request->whatsApp1;
            $d->whatsApp2   = $request->whatsApp2;

            $d->horarios   = $request->horarios;
            $d->subtes     = $request->subtes;
            $d->colectivos = $request->colectivos;
            $d->avenidas   = $request->avenidas;

            $d->desde             = $request->desde;
            $d->hasta             = $request->hasta;
            $d->url_mercado_libre = $request->url_mercado_libre;
            $d->link_otra_pagina  = $request->link_otra_pagina;
            $d->url_app_store     = $request->url_app_store;
            $d->url_google_play   = $request->url_google_play;
            $d->url_mercadopago   = $request->url_mercadopago;

            $d->reservaMercaderiaHrs = $request->reservaMercaderiaHrs;

            $d->uso_cupon_web = $request->uso_cupon_web;
            $d->uso_cupon_app = $request->uso_cupon_app;
            $d->googleName    = $request->googleName;

            $d->PerViPreSinAuth      = $request->PerViPreSinAuth;
            $d->PerAccUserAprobAdmin = $request->PerAccUserAprobAdmin;
            $d->mayorista            = $request->mayorista;

            $d->listaPrecioDistribuidor = $request->listaPrecioDistribuidor;

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

                $d->imagen = $nombre_interno;
            }

            if (is_null($request->img_HOME)) {
            } else {
                $originalImage = $request->img_HOME;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_HOME = $nombre_interno;
            }

            if (is_null($request->img_OFERTA)) {
            } else {
                $originalImage = $request->img_OFERTA;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_OFERTA = $nombre_interno;
            }

            if (is_null($request->img_BLOG)) {
            } else {
                $originalImage = $request->img_BLOG;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_BLOG = $nombre_interno;
            }

            if (is_null($request->img_como_comprar)) {
            } else {
                $originalImage = $request->img_como_comprar;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_como_comprar = $nombre_interno;
            }

            if (is_null($request->img_logo)) {
            } else {
                $originalImage = $request->img_logo;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(350, 110, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_logo = $nombre_interno;
            }

            if (is_null($request->img_seccionDelivery)) {
            } else {
                $originalImage = $request->img_seccionDelivery;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_seccionDelivery = $nombre_interno;
            }

            if (is_null($request->img_novedades)) {
            } else {
                $originalImage = $request->img_novedades;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(2048, 2048, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_novedades = $nombre_interno;
            }

            if (is_null($request->img_mapa)) {
            } else {
                $originalImage = $request->img_mapa;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_mapa = $nombre_interno;
            }

            if (is_null($request->img_recomprar)) {
            } else {
                $originalImage = $request->img_recomprar;

                $thumbnailImage = Image::make($originalImage);

                $thumbnailImage->fit(1450, 450, function($constraint) {
                    $constraint->aspectRatio();
                });

                $nombre_publico = $originalImage->getClientOriginalName();
                $extension      = $originalImage->getClientOriginalExtension();

                $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

                $d->img_recomprar = $nombre_interno;
            }

            if (! is_null($request->listaPrecio)) {

                $this->validate($request, [
                    'listaPrecio' => 'integer|between:1,9',
                ], [
                    'listaPrecio.between' => 'El rango para la lista de precios es :min - :max',
                ]);

                $d->listaPrecio = $request->listaPrecio;
            }

            $d->save();

            $response = [
                'msj'                         => 'Footer Actualizado',
                'set_imagen'                  => asset('storage\\imagenFooter\\'.$d->imagen),
                'set_imagen_img_como_comprar' => asset('storage\\imagenFooter\\'.@$d->img_como_comprar),
                'set_imagen_img_HOME'         => asset('storage\\imagenFooter\\'.@$d->img_HOME),
                'set_imagen_img_OFERTA'       => asset('storage\\imagenFooter\\'.@$d->img_OFERTA),
                'set_imagen_img_BLOG'         => asset('storage\\imagenFooter\\'.@$d->img_BLOG),
                'set_imagen_img_mapa'         => asset('storage\\imagenFooter\\'.@$d->img_mapa),
                'set_imagen_seccionDelivery'  => asset('storage\\imagenFooter\\'.@$d->img_seccionDelivery),
                'set_imagen_recomprar'        => asset('storage\\imagenFooter\\'.@$d->img_recomprar),
            ];

            return response()->json($response, 201);
        }
    }

    public function addImgenes(Request $request) {

        $d = ConfigFooter::first();

        if (! is_null($request->img_HOME) && $request->img_HOME != "") {
            $originalImage = $request->img_HOME;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_HOME = $nombre_interno;
        }

        if (! is_null($request->img_OFERTA) && $request->img_OFERTA != "") {
            $originalImage = $request->img_OFERTA;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_OFERTA = $nombre_interno;
        }

        if (! is_null($request->img_BLOG) && $request->img_BLOG != "") {
            $originalImage = $request->img_BLOG;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_BLOG = $nombre_interno;
        }

        if (! is_null($request->img_como_comprar) && $request->img_como_comprar != "") {
            $originalImage = $request->img_como_comprar;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(2048, 2048, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_como_comprar = $nombre_interno;
        }

        if (! is_null($request->img_logo) && $request->img_logo != "") {
            $originalImage = $request->img_logo;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(350, 110, function($constraint) {

                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_logo = $nombre_interno;
        }

        if (! is_null($request->img_seccionDelivery) && $request->img_seccionDelivery != "") {
            $originalImage = $request->img_seccionDelivery;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_seccionDelivery = $nombre_interno;
        }

        if (! is_null($request->img_novedades) && $request->img_novedades != "") {
            $originalImage = $request->img_novedades;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(2048, 2048, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_novedades = $nombre_interno;
        }

        if (! is_null($request->img_mapa) && $request->img_mapa != "") {
            $originalImage = $request->img_mapa;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_mapa = $nombre_interno;
        }

        if (! is_null($request->img_recomprar) && $request->img_recomprar != "") {
            $originalImage = $request->img_recomprar;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(1450, 450, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\imagenFooter\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $d->img_recomprar = $nombre_interno;
        }

        $d->save();

        $response = [
            'msj'                            => 'Actualizado correctamente',
            'set_imagen_img_como_comprar'    => asset('storage\\imagenFooter\\'.@$d->img_como_comprar),
            'set_imagen_img_HOME'            => asset('storage\\imagenFooter\\'.@$d->img_HOME),
            'set_imagen_img_OFERTA'          => asset('storage\\imagenFooter\\'.@$d->img_OFERTA),
            'set_imagen_img_BLOG'            => asset('storage\\imagenFooter\\'.@$d->img_BLOG),
            'set_imagen_img_logo'            => asset('storage\\imagenFooter\\'.@$d->img_logo),
            'set_imagen_img_seccionDelivery' => asset('storage\\imagenFooter\\'.@$d->img_seccionDelivery),
            'set_imagen_img_novedades'       => asset('storage\\imagenFooter\\'.@$d->img_novedades),
            'set_imagen_img_mapa'            => asset('storage\\imagenFooter\\'.@$d->img_mapa),
            'set_imagen_img_recomprar'       => asset('storage\\imagenFooter\\'.@$d->img_recomprar),
        ];

        return response()->json($response, 201);
    }
}
