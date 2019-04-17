<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Image;

class BlogController extends Controller {
    public function add(Request $request) {

        $this->validate($request, [
            //'fk_idusuario'   => 'required',
            'titulo'         => 'required',
            'foto'           => 'image|required|mimes:jpeg,png,jpg,gif,svg',
            'descripcion'    => 'required',
            'fk_idCategoria' => 'required',
        ], [
            //'fk_idusuario.required'   => 'El campo es requerido',
            'titulo.required' => 'El campo es requerido',

            'foto.image'    => 'La Imagen es requerida',
            'foto.required' => 'La Imagen es requerida',
            'foto.mimes'    => 'Solo jpeg, png, bmp,tiff son soportados',

            'descripcion.required'    => 'El campo es requerido',
            'fk_idCategoria.required' => 'El campo es requerido',
        ]);

        DB::beginTransaction();

        try {

            $originalImage = $request->foto;

            $thumbnailImage = Image::make($originalImage);

            $thumbnailImage->fit(2048, 2048, function($constraint) {
                $constraint->aspectRatio();
            });

            $nombre_publico = $originalImage->getClientOriginalName();
            $extension      = $originalImage->getClientOriginalExtension();

            $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
            $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

            Storage::disk('local')->put('\\blog\\'.$nombre_interno, (string) $thumbnailImage->encode());

            $Blog               = new Blog($request->all());
            $Blog->fk_idusuario = Auth::user()->fk_idPerfil;
            $Blog->foto         = $nombre_interno;

            $Blog->save();

            $response = [
                'msj'        => 'Blog Creado Exitosamente',
                'blog'       => $Blog,
                'set_imagen' => asset('storage\\blog\\'.$Blog->foto),
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en BlogController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function edit(Request $request, $idBlog) {

        if ($request->all() == []) {
            $response = [
                'msj' => 'debe enviar algún parametro para actualizar',
            ];

            return response()->json($response, 404);
        }

        DB::beginTransaction();

        try {
            $Blog = Blog::find($idBlog);

            if (! is_null($Blog)) {
                $Blog->fill($request->all());

                if (is_null($request->foto)) {
                } else {
                    $originalImage = $request->foto;

                    $thumbnailImage = Image::make($originalImage);

                    $thumbnailImage->fit(2048, 2048, function($constraint) {
                        $constraint->aspectRatio();
                    });

                    $nombre_publico = $originalImage->getClientOriginalName();
                    $extension      = $originalImage->getClientOriginalExtension();

                    $nombre_interno = str_replace('.'.$extension, '', $nombre_publico);
                    $nombre_interno = str_slug($nombre_interno, '-').'-'.time().'-'.strval(rand(100, 999)).'.'.$extension;

                    Storage::disk('local')->put('\\blog\\'.$nombre_interno, (string) $thumbnailImage->encode());

                    $Blog->fk_idusuario = Auth::user()->fk_idPerfil;
                    $Blog->foto         = $nombre_interno;
                }

                $response = [
                    'msj'        => 'Información actulizada',
                    'blog'       => $Blog,
                    'set_imagen' => asset('storage\\blog\\'.$Blog->foto),
                ];

                $Blog->save();
                DB::commit();

                return response()->json($response, 200);
            } else {
                $response = [
                    'msj' => 'El blog no existe',
                ];

                return response()->json($response, 404);
            }
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en BlogController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function borrar($idBlog) {
        DB::beginTransaction();

        try {
            $Blog = Blog::findOrFail($idBlog);
            $Blog->delete();

            $response = [
                'msj' => 'Blog eliminado Correctamente',
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en BlogController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    public function listar() {
        $Blog = Blog::get();

        $Blog->each(function($Blog) {
            $Blog->set_imagen = asset('storage\\blog\\'.$Blog->foto);
        });

        $response = [
            'msj'   => 'Lista de Blogs',
            'blogs' => $Blog,
        ];

        return response()->json($response, 200);
    }

    public function buscarIdBlogCategoria($idBlog) {

        $Blog = Blog::find($idBlog);

        if (! is_null($Blog)) {

            $response = [
                'msj'        => 'Lista de Blogs',
                'blogs'      => $Blog,
                'set_imagen' => asset('storage\\blog\\'.$Blog->foto),
            ];

            return response()->json($response, 200);
        } else {
            $response = [
                'msj' => 'El blog no existe',
            ];

            return response()->json($response, 404);
        }
    }

    public function listarBlogPorIdDeCategoria($idBlogCategoria) {

        $blog = Blog::with([ 'categoriaBlog' ])->where('fk_idCategoria', $idBlogCategoria)->get();
        $blog->each(function($blog) {
            $blog->set_imagen = asset('storage\\blog\\'.$blog->foto);
        });

        $response = [
            'msj'   => 'lista de blogs por categoria',
            'blgos' => $blog,
        ];

        return response()->json($response, 201);
    }
}


