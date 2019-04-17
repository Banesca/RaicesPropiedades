<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

use App\HorarioAtencion;

class HorarioAtencionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HorarioAtencion::get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'desde'   => 'required',
            'hasta'    => 'required',
        ], [
            'desde.required' => 'Desde es requerido',
            'hasta.required' => 'Hasta es requerido',
        ]);

        try {
            $h = new HorarioAtencion($request->all());
            $h->save();        
            $response = [
                'msj'  => 'Horario creado exitosamente',
                'horario' => $h,
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en HorarioAtencionController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $h = HorarioAtencion::find($id);

        if(is_null($h)){
            return response()->json(['msj'=>'no se encontro resultado'], 401);
        }else{
            return response()->json(['busqueda_horario'=>$h], 201);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {        
      
        $this->validate($request, [
            'desde'   => 'required',
            'hasta'    => 'required',
        ], [
            'desde.required' => 'Desde es requerido',
            'hasta.required' => 'Hasta es requerido',
        ]);

        $h = HorarioAtencion::find($id);

        if(is_null($h)){
            return response()->json(['msj'=>'No se logro conseguir informacion del horario'], 401);
        }

        try {
            $h->fill($request->all());
            $h->save();        
            $response = [
                'msj'  => 'Horario actualizado exitosamente',
                'horario' => $h,
            ];
            DB::commit();
            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en HorarioAtencionController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $h = HorarioAtencion::find($id);

        if(is_null($h)){
            return response()->json(['msj'=>'no se encontro resultado'], 401);
        }

        $h->delete();
        $h->save();
        return response()->json(['msj'=>'Se elimino exitosamente'], 201);
    }
}
