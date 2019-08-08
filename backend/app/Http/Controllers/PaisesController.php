<?php

namespace App\Http\Controllers;

use App\Paises;
use App\Provincias;
use App\Regiones;
use App\Partidos;
use App\Localidades;
use App\Barrios;
use App\subBarrios;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaisesController extends Controller
{

    public function getPais(Request $request) {

        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindPaises?contentType=json';
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!Paises::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = Paises::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
   
                ]);
            }
        } 
        $Paises=Paises::get();
            $response = [
                'Paises' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function getRegiones(Request $request) {
        $request->validate([
            'idPais' => 'required',
     
        ]);
        $idPais=$request->idPais;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindRegionesByPaisBusquedaHome?contentType=json&idPais='.$idPais;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        //  return response()->json($response, 201);
        foreach($result as $pais){
            foreach($pais as $region){
            // var_dump($region['Nombre']);
            if(!Regiones::where('nombre','=',$region['Nombre'])->exists()){
                $regiones = Regiones::create([
                    'id'    => $region['Id'],
                    'nombre'  => $region['Nombre'],
                    'fk_pais'  => $idPais,
   
                ]);
            }
            }
        } 
        $Regiones=Regiones::get();
            $response = [
                'Regiones' => $Regiones,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    } 


    public function getProvincias(Request $request) {
        $request->validate([
            'idPais' => 'required',
     
        ]);
        $idPais=$request->idPais;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindProvincias?contentType=json&idPais='.$idPais;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!Provincias::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = Provincias::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
                    'fk_pais'  => $idPais,
   
                ]);
            }
        } 
        $Paises=Provincias::get();
            $response = [
                'Provincias' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function getPartidos(Request $request) {
        $request->validate([
            'idProvincia' => 'required',
     
        ]);
        $idProvincia=$request->idProvincia;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindPartidos?contentType=json&IdProvincia='.$idProvincia;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!Partidos::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = Partidos::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
                    'fk_provincia'  => $idProvincia,
   
                ]);
            }
        } 
        $Paises=Partidos::get();
            $response = [
                'Partidos' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function getLocalidades(Request $request) {
        $request->validate([
            'idPartido' => 'required',
     
        ]);
        $idPartido=$request->idPartido;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindLocalidades?contentType=json&IdPartido='.$idPartido;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!Localidades::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = Localidades::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
                    'fk_partido'  => $idPartido,
   
                ]);
            }
        } 
        $Paises=Localidades::get();
            $response = [
                'Localidades' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }

    public function getBarrios(Request $request) {
        $request->validate([
            'idLocalidad' => 'required',
     
        ]);
        $idLocalidad=$request->idLocalidad;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindBarrios?contentType=json&idLocalidad='.$idLocalidad;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!Barrios::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = Barrios::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
                    'fk_localidad'  => $idLocalidad,
   
                ]);
            }
        } 
        $Paises=Barrios::get();
            $response = [
                'Barrios' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }


    public function getsubBarrios(Request $request) {
        $request->validate([
            'idBarrio' => 'required',
     
        ]);
        $idBarrio=$request->idBarrio;
        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindSubBarrios?contentType=json&idBarrio='.$idBarrio;
      
           $ch = curl_init();
           curl_setopt($ch, CURLOPT_URL, $url);
           curl_setopt($ch, CURLOPT_POST, 0);
           curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
      
           $response = curl_exec ($ch);
           $err = curl_error($ch);  //if you need
           curl_close ($ch);
           $result = json_decode($response, true);
        // return response()->json($response, 201);
        foreach($result as $pais){
            if(!subBarrios::where('nombre','=',$pais['Nombre'])->exists()){
                $alert = subBarrios::create([
                    'id'    => $pais['Id'],
                    'nombre'  => $pais['Nombre'],
                    'fk_barrio'  => $idBarrio,
   
                ]);
            }
        } 
        $Paises=subBarrios::get();
            $response = [
                'subBarrios' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: '.$e->getMessage().', Linea: '.$e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }

    }
}
