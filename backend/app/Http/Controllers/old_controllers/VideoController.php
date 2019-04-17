<?php

namespace App\Http\Controllers;

use App\Video;
use App\StatusSistema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{
    
    /**
     * Almacena la ruta y el titulo del video.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo'  => 'required',
            'url' => 'required',
        ], [
            'titulo.required'  => 'El titulo del video es requerida',
            'url.required' => 'La Url del video espuesta es requerida',
        ]);
    
        DB::beginTransaction();
    
        try {
    
            $videoRec = new Video($request->all());
            $videoRec->fk_idUser          = Auth::user()->id;
            $videoRec->fk_idStatusSistema = 1; //para iniciarlo activo
            $videoRec->user;
            $videoRec->status;
    
            $videoRec->save();
    
            $response = [
                'msj'                => 'Video agregado correctamente',
                'video' => $videoRec,
            ];
            DB::commit();
    
            return response()->json($response, 201);
        } catch (\Exception $e) {
    
            DB::rollback();
            Log::error('Ha ocurrido un error en VideoController: '.$e->getMessage().', Linea: '.$e->getLine());
    
            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Actualiza los datos del video.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $idVideo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idVideo)
    {
        $this->validate($request, [
            'titulo'  => 'required',
            'url' => 'required',
        ], [
            'titulo.required'  => 'El titulo del video es requerido',
            'url.required' => 'La Url del video es requerido',
        ]);

        DB::beginTransaction();

        try {
            $videoRec = Video::findOrFail($idVideo);

            $videoRec->fill($request->all());

            $response = [
                'msj'                  => 'Info actulizada',
                'video' => $videoRec,
            ];

            $videoRec->save();
            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en VideoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    /**
     * Elimina la informacion del video.
     *
     * @param  $idVideo
     * @return \Illuminate\Http\Response
     */
    public function destroy($idVideo)
    {
        DB::beginTransaction();

        try {
            $videoRec = Video::findOrFail($idVideo);
            $videoRec->delete();

            $response = [
                'msj'                  => 'Video eliminado correctamente',
                'video' => $videoRec,
            ];

            DB::commit();

            return response()->json($response, 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en VideoController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de eliminar los datos.',
            ], 500);
        }
    }

    /**
     * Cambia el status.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @param  $idVideo
     * @return \Illuminate\Http\Response
     */
    public function cambiarStatus(Request $request, $idVideo) {

        $this->validate($request, [
            'fk_idStatusSistema' => 'required',
        ], [
            'fk_idStatusSistema.required' => 'El status es requerido',
        ]);

        $status_min = StatusSistema::min('idStatusSistema');
        $status_max = StatusSistema::max('idStatusSistema');
        if ($request->fk_idStatusSistema > $status_max || $request->fk_idStatusSistema < $status_min) {
            $response = [
                'msj'                => 'El Estatus que intenta asignar No existe',
                'status_disponibles' => StatusSistema::orderBy('descripcion', 'ASC')->pluck('descripcion', 'idStatusSistema'),
            ];

            return response()->json($response, 404);

        } else {

            DB::beginTransaction();

            try {
                $videoRec = Video::findOrFail($idVideo);

                $videoRec->fill($request->all());

                $response = [
                    'msj' => 'Status actulizado',
                ];

                $videoRec->save();
                DB::commit();

                return response()->json($response, 200);
            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Ha ocurrido un error en PreguntaFrecuenteController: '.$e->getMessage().', Linea: '.$e->getLine());

                return response()->json([
                    'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
                ], 500);
            }
        }

    }

    /**
     * Devuelve una lista de los videos.
     *
     * @return \Illuminate\Http\Response
     */
    public function listar() {
        
        $videoRec = Video::all();
        $videoRec->each(function($videoRec) {
            $videoRec->user;

            return $videoRec;
        });

        $response = [
            'msj'   => 'Lista de Videos',
            'videos' => $videoRec,
        ];

        return response()->json($response, 202);

    }
}
