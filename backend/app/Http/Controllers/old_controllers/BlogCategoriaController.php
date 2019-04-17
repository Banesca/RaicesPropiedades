<?php

namespace App\Http\Controllers;

use App\Blog;
use App\BlogCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class BlogCategoriaController extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            'titulo' => 'required',
            'imagen' => 'required',

        ], [
            'titulo.required' => 'El título es requerido',
            'imagen.required' => 'La imagen es requerida',
        ]);

        DB::beginTransaction();

        try {

            /*para la imagen*/
            $originalImage = $request->imagen;

            $thumbnailImage = Image::make($originalImage);
            $thumbnailImage->fit(2048, 2048, function($constraint) {
                $constraint->aspectRatio();
            });
            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = 'png';
            //$extension = $originalImage->getClientOriginalExtension();
            $nombre_interno1 = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno1 = str_slug($nombre_interno1, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
            Storage::disk('local')->put('\\Categoria_blog\\'.$nombre_interno1, (string) $thumbnailImage->encode());
            /*para la imagen*/

            $CategoriaBlog         = new BlogCategoria($request->all());
            $CategoriaBlog->imagen = $nombre_interno1;

            $CategoriaBlog->save();

            $response = [
                'msj'        => 'Categoria de blog Creado',
                'categoria'  => $CategoriaBlog,
                'set_imagen' => asset('storage\\Categoria_blog\\'.$CategoriaBlog->imagen),
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en BlogCategoriaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function edit(Request $request, $idBlogCategoria) {


        if ($request->all() == []) {
            $response = [
                'msj' => 'debe enviar algún parametro para actualizar',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();

        try {
            $CatBlog = BlogCategoria::find($idBlogCategoria);

            if (! is_null($CatBlog)) {

                $CatBlog->fill($request->all());

                if (! is_null($request->imagen)) {

                    $originalImage = $request->imagen;

                    $thumbnailImage = Image::make($originalImage);
                    $thumbnailImage->fit(2048, 2048, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = 'png';
                    //$extension = $originalImage->getClientOriginalExtension();
                    $nombre_interno1 = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno1 = str_slug($nombre_interno1, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;
                    Storage::disk('local')->put('\\Categoria_blog\\'.$nombre_interno1, (string) $thumbnailImage->encode());
                    /*para la imagen*/

                    $CatBlog->imagen = $nombre_interno1;
                }

                $response = [
                    'msj'        => 'Información actulizada',
                    'categoria'  => $CatBlog,
                    'set_imagen' => asset('storage\\Categoria_blog\\'.$CatBlog->imagen),
                ];

                $CatBlog->save();
                DB::commit();

                return response()->json($response, 200);
            } else {
                $response = [
                    'msj' => 'La Categoria no existe',
                ];

                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en BlogCategoriaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function borrar($idBlogCategoria) {

        DB::beginTransaction();

        try {
            $blogDeEsaCategoria = Blog::where('fk_idCategoria', $idBlogCategoria)->pluck('idBlog');

            if (count($blogDeEsaCategoria) >= 1) {
                $response = [
                    'msj'                => 'No se puede eliminar la categoria pues hay blog que dependen de esta',
                    'idBlogDependientes' => $blogDeEsaCategoria,
                ];

                return response()->json($response, 409);

            } else {
                $CatBlog = BlogCategoria::find($idBlogCategoria);

                if (! is_null($CatBlog)) {
                    $CatBlog->delete();

                    $response = [
                        'msj' => 'Categoria eliminada Correctamente',
                    ];

                    DB::commit();

                    return response()->json($response, 200);
                } else {

                    $response = [
                        'msj' => 'No existe la categoria',
                    ];

                    return response()->json($response, 200);
                }
            }

        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en BlogCategoriaController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar() {
        $CatBlog = BlogCategoria::get();

        $CatBlog->each(function($CatBlog) {
            $CatBlog->set_imagen = asset('storage\\Categoria_blog\\'.$CatBlog->imagen);
        });

        $response = [
            'msj' => 'Lista de Categorias',
            'cat' => $CatBlog,
        ];

        return response()->json($response, 200);
    }

    public function buscarIdBlogCategoria($idBlogCategoria) {

        $CatBlog = BlogCategoria::find($idBlogCategoria);
        if (! is_null($CatBlog)) {

            $response = [
                'msj'        => 'Lista de Categorias',
                'cat'        => $CatBlog,
                'set_imagen' => asset('storage\\Categoria_blog\\'.$CatBlog->imagen),
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'msj' => 'La Categoria no existe',
            ];

            return response()->json($response, 404);
        }
    }

}
