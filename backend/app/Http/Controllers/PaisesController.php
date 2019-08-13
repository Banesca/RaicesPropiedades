<?php

namespace App\Http\Controllers;

ini_set('memory_limit', '512M');
ini_set('max_execution_time', '15000');
use App\Barrios;
use App\Localidades;
use App\Paises;
use App\Partidos;
use App\Provincias;
use App\Regiones;
use App\subBarrios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PaisesController extends Controller
{
    public function getPais()
    {

        DB::beginTransaction();

        try {
            $Paises   = Paises::get();
            $response = [
                'Paises' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getRegiones()
    {

        $idPais = 1;
        DB::beginTransaction();

        try {

            $Regiones = Regiones::where('fk_pais', '=', $idPais)->get();
            $response = [
                'Regiones' => $Regiones,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getProvincias()
    {

        $idPais = 1;
        DB::beginTransaction();
        try {

            $Paises   = Provincias::where('fk_pais', '=', $idPais)->get();
            $response = [
                'Provincias' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getPartidos(Request $request)
    {
        $request->validate([
            'fk_provincia' => 'required',
        ]);
        $fk_provincia = $request->fk_provincia;
        DB::beginTransaction();

        try {

            $Partidos = Partidos::where('fk_provincia', $fk_provincia)->get();
            $response = [
                'Partidos' => $Partidos,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getLocalidades(Request $request)
    {
        $request->validate([
            'fk_idPartido' => 'required',

        ]);
        $fk_idPartido = $request->fk_idPartido;
        DB::beginTransaction();

        try {

            $Paises   = Localidades::where('fk_idPartido', '=', $fk_idPartido)->get();
            $response = [
                'Localidades' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getBarrios(Request $request)
    {
        $request->validate([
            'idLocalidad' => 'required',

        ]);
        $idLocalidad = $request->idLocalidad;
        DB::beginTransaction();

        try {

            $Paises   = Barrios::where('fk_localidad', '=', $idLocalidad)->get();
            $response = [
                'Barrios' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function getsubBarrios(Request $request)
    {
        $request->validate([
            'idBarrio' => 'required',
        ]);

        $idBarrio = $request->idBarrio;
        DB::beginTransaction();

        try {

            $Paises   = subBarrios::where('fk_barrio', '=', $idBarrio)->get();
            $response = [
                'subBarrios' => $Paises,
            ];
            DB::commit();

            return response()->json($response, 201);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function sincService()
    {

        DB::beginTransaction();

        try {

            $url = 'http://www.inmuebles.clarin.com/Regiones/FindPaises?contentType=json';

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

            $response = curl_exec($ch);
            $err      = curl_error($ch);  //if you need
            curl_close($ch);
            $result = json_decode($response, true);
            // return response()->json($response, 201);
            foreach ($result as $pais) {
                if (! Paises::where('nombre', '=', $pais['Nombre'])->exists()) {
                    $paises = Paises::create([
                        'id'     => $pais['Id'],
                        'nombre' => $pais['Nombre'],
                    ]);
                }

                $url = 'http://www.inmuebles.clarin.com/Regiones/FindRegionesByPaisBusquedaHome?contentType=json&idPais=' . $pais['Id'];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);
                $err      = curl_error($ch);  //if you need
                curl_close($ch);
                $result = json_decode($response, true);
                //  return response()->json($response, 201);
                if (isset($result)) {
                    foreach ($result as $regiones) {
                        if (isset($regiones)) {
                            foreach ($regiones as $region) {
                                // var_dump($region['Nombre']);
                                if (! Regiones::where('nombre', '=', $region['Nombre'])->exists()) {
                                    $regiones = Regiones::create([
                                        'id'      => $region['Id'],
                                        'nombre'  => $region['Nombre'],
                                        'fk_pais' => $pais['Id'],

                                    ]);
                                }

                                $url = 'https://www.inmuebles.clarin.com/Regiones/FindChildrenByRegionBusquedaHome?contentType=json&idRegionBusqueda=' . $region['Id'];

                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_POST, 0);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                $response = curl_exec($ch);
                                $err      = curl_error($ch);  //if you need
                                curl_close($ch);
                                $result = json_decode($response, true);
                                // return response()->json($response, 201);
                                /*  if (isset($result['Localidades'])) {
                                       foreach ($result['Localidades'] as $localidad) {
                                           if (! Localidades::where('nombre', '=', $localidad['Nombre'])->exists()) {
                                               Localidades::create([
                                                   'id'        => $localidad['Id'],
                                                   'nombre'    => $localidad['Nombre'],
                                                   'fk_region' => $region['Id'],

                                               ]);
                                           }

                                           foreach ($localidad['Barrios'] as $barrio) {

                                               if (! Barrios::where('nombre', '=', $barrio['Nombre'])->exists()) {
                                                   Barrios::create([
                                                       'id'           => $barrio['Id'],
                                                       'nombre'       => $barrio['Nombre'],
                                                       'fk_localidad' => $localidad['Id'],

                                                   ]);
                                               }


                                               foreach ($barrio['SubBarrios'] as $subBarrios) {

                                                   if (! subBarrios::where('nombre', '=', $subBarrios['Nombre'])->exists()) {
                                                       subBarrios::create([
                                                           'id'        => $subBarrios['Id'],
                                                           'nombre'    => $subBarrios['Nombre'],
                                                           'fk_barrio' => $barrio['Id'],

                                                       ]);
                                                   }

                                               }
                                           }
                                       }*/
                            }
                        }
                    }
                }

                $url = 'http://www.inmuebles.clarin.com/Regiones/FindProvincias?contentType=json&idPais=' . $pais['Id'];

                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                $response = curl_exec($ch);
                $err      = curl_error($ch);  //if you need
                curl_close($ch);
                $result = json_decode($response, true);
                // return response()->json($response, 201);
                if (isset($result)) {
                    foreach ($result as $provincias) {
                        if (! Provincias::where('nombre', '=', $provincias['Nombre'])->exists()) {
                            Provincias::create([
                                'id'      => $provincias['Id'],
                                'nombre'  => $provincias['Nombre'],
                                'fk_pais' => $pais['Id'],

                            ]);
                        }

                        $url = 'http://www.inmuebles.clarin.com/Regiones/FindPartidos?contentType=json&IdProvincia=' . $provincias['Id'];

                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $url);
                        curl_setopt($ch, CURLOPT_POST, 0);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                        $response = curl_exec($ch);
                        $err      = curl_error($ch);  //if you need
                        curl_close($ch);
                        $result = json_decode($response, true);
                        // return response()->json($response, 201);
                        if (isset($result)) {
                            foreach ($result as $partido) {
                                if (! Partidos::where('nombre', '=', $partido['Nombre'])->exists()) {
                                    Partidos::create([
                                        'id'           => $partido['Id'],
                                        'nombre'       => $partido['Nombre'],
                                        'fk_provincia' => $provincias['Id'],
                                    ]);
                                }

                                $url = 'https://gestion.argenprop.com/Regiones/FindLocalidades?idPartido=' . $partido['Id'];

                                $ch = curl_init();
                                curl_setopt($ch, CURLOPT_URL, $url);
                                curl_setopt($ch, CURLOPT_POST, 0);
                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                $response = curl_exec($ch);
                                $err      = curl_error($ch);  //if you need
                                curl_close($ch);
                                $result = json_decode($response, true);

                                if (isset($result)) {
                                    foreach ($result as $localidad) {
                                        if (! Localidades::where('nombre', '=', $localidad['Nombre'])->exists()) {
                                            Localidades::create([
                                                'id'           => $localidad['Id'],
                                                'nombre'       => $localidad['Nombre'],
                                                'fk_idPartido' => $partido['Id'],
                                            ]);
                                        }

                                        $url = 'https://gestion.argenprop.com/Regiones/FindBarrios?idLocalidad=' . $localidad['Id'];

                                        $ch = curl_init();
                                        curl_setopt($ch, CURLOPT_URL, $url);
                                        curl_setopt($ch, CURLOPT_POST, 0);
                                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                        $response = curl_exec($ch);
                                        $err      = curl_error($ch);  //if you need
                                        curl_close($ch);
                                        $result = json_decode($response, true);


                                        if (isset($result)) {
                                            foreach ($result as $barrio) {

                                                if (! Barrios::where('nombre', '=', $barrio['Nombre'])->exists()) {
                                                    Barrios::create([
                                                        'id'           => $barrio['Id'],
                                                        'nombre'       => $barrio['Nombre'],
                                                        'fk_localidad' => $localidad['Id'],

                                                    ]);
                                                }

                                                $url = 'https://gestion.argenprop.com/Regiones/FindSubBarrios?idBarrio=' . $barrio['Id'];

                                                $ch = curl_init();
                                                curl_setopt($ch, CURLOPT_URL, $url);
                                                curl_setopt($ch, CURLOPT_POST, 0);
                                                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                                                $response = curl_exec($ch);
                                                $err      = curl_error($ch);  //if you need
                                                curl_close($ch);
                                                $result = json_decode($response, true);
                                                if (isset($result)) {
                                                    foreach ($result as $subBarrio) {

                                                        if (! subBarrios::where('nombre', '=', $subBarrio['Nombre'])->exists()) {
                                                            subBarrios::create([
                                                                'id'        => $subBarrio['Id'],
                                                                'nombre'    => $subBarrio['Nombre'],
                                                                'fk_barrio' => $barrio['Id'],
                                                            ]);
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
                if ($pais['Nombre']=='Argentina') {
                    break;
                }
            }
            DB::commit();

            return response()->json('Sincronizado correctamente', 200);
        } catch (\Exception $e) {

            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json([
                'message' => 'Ha ocurrido un error al tratar de guardar los datos.',
            ], 500);
        }
    }

    public function sincService2()
    {

        DB::beginTransaction();

        try {

            /*paises*/
            $url = 'http://www.inmuebles.clarin.com/Regiones/FindPaises?contentType=json';
            $ch  = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $err      = curl_error($ch);
            curl_close($ch);
            $result = json_decode($response, true);
            foreach ($result as $pais) {
                if (! Paises::where('nombre', '=', $pais['Nombre'])->exists()) {
                    $paises = Paises::create([
                        'id'     => $pais['Id'],
                        'nombre' => $pais['Nombre'],
                    ]);
                }
            }
            /*paises*/

            /*regiones*/
            $url = 'http://www.inmuebles.clarin.com/Regiones/FindRegionesByPaisBusquedaHome?contentType=json&idPais=1';
            $ch  = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $err      = curl_error($ch);
            curl_close($ch);
            $result = json_decode($response, true);
            if (isset($result)) {
                foreach ($result as $regiones) {
                    if (isset($regiones)) {
                        foreach ($regiones as $region) {
                            if (! Regiones::where('nombre', '=', $region['Nombre'])->exists()) {
                                $regiones = Regiones::create([
                                    'id'      => $region['Id'],
                                    'nombre'  => $region['Nombre'],
                                    'fk_pais' => 1,
                                ]);
                            }
                        }
                    }
                }
            }
            /*regiones*/

            /*PROVINCIAS*/
            $url = 'http://www.inmuebles.clarin.com/Regiones/FindProvincias?contentType=json&idPais=1';
            $ch  = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_POST, 0);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            $err      = curl_error($ch);  //if you need
            curl_close($ch);
            $result_PROVINCIA = json_decode($response, true);
            // return response()->json($response, 201);
            if (isset($result_PROVINCIA)) {
                foreach ($result_PROVINCIA as $provincias) {
                    if (! Provincias::where('nombre', '=', $provincias['Nombre'])->exists()) {
                        Provincias::create([
                            'id'      => $provincias['Id'],
                            'nombre'  => $provincias['Nombre'],
                            'fk_pais' => 1,
                        ]);
                    }

                    /*PARTIDOS*/
                    $url = 'http://www.inmuebles.clarin.com/Regiones/FindPartidos?contentType=json&IdProvincia=' . $provincias['Id'];
                    $ch  = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $url);
                    curl_setopt($ch, CURLOPT_POST, 0);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($ch);
                    $err      = curl_error($ch);
                    curl_close($ch);
                    $result_PARTIDOS = json_decode($response, true);
                    if (isset($result_PARTIDOS)) {
                        foreach ($result_PARTIDOS as $partido) {
                            if (! Partidos::where('nombre', '=', $partido['Nombre'])->exists()) {
                                Partidos::create([
                                    'id'           => $partido['Id'],
                                    'nombre'       => $partido['Nombre'],
                                    'fk_provincia' => $provincias['Id'],
                                ]);
                            }
                        }
                    }
                    /*PARTIDOS*/
                }
            }
            /*PROVINCIAS*/

            /*LOCALIDADES*/
            foreach (Partidos::get() as $partido) {
                $url = 'https://gestion.argenprop.com/Regiones/FindLocalidades?idPartido=' . $partido->id;
                $ch  = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $err      = curl_error($ch);  //if you need
                curl_close($ch);
                $result_LOCALIDADES = json_decode($response, true);
                if (isset($result_LOCALIDADES)) {
                    foreach ($result_LOCALIDADES as $key=>$localidad) {
                        if (! Localidades::where('nombre', '=', $localidad['Nombre'])->exists()) {
                            Localidades::create([
                                'id'           => $localidad['Id'],
                                'nombre'       => $localidad['Nombre'],
                                'fk_idPartido' => $partido->id,
                            ]);
                        }
                    }
                }
            }
            /*LOCALIDADES*/

            /*BARRIOS*/
            foreach (Localidades::get() as $localidad) {
                $url = 'https://www.inmuebles.clarin.com/Regiones/FindBarrios?contentType=json&idLocalidad=' . $localidad->id;
                $ch  = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $err      = curl_error($ch);  //if you need
                curl_close($ch);
                $result_LOCALIDADES = json_decode($response, true);
                if (isset($result_LOCALIDADES)) {
                    foreach ($result_LOCALIDADES as $key=>$barrio) {
                        if (! Barrios::where('nombre', '=', $barrio['Nombre'])->exists()) {
                            Barrios::create([
                                'id'           => $barrio['Id'],
                                'nombre'       => $barrio['Nombre'],
                                'fk_localidad' => $localidad->id,
                            ]);
                        }
                    }
                }
            }
            /*BARRIOS*/

            /*SUB-BARRIOS*/
            foreach (Barrios::get() as $key=>$barrio) {
                $url = 'https://www.inmuebles.clarin.com/Regiones/FindSubBarrios?contentType=json&idBarrio=' . $barrio->id;
                $ch  = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 0);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                $err      = curl_error($ch);
                curl_close($ch);
                $result_subBarrios = json_decode($response, true);
                if (isset($result_subBarrios)) {
                    foreach ($result_subBarrios as $SubBarrio) {
                        if (! subBarrios::where('nombre', '=', $SubBarrio['Nombre'])->exists()) {
                            subBarrios::create([
                                'id'        => $SubBarrio['Id'],
                                'nombre'    => $SubBarrio['Nombre'],
                                'fk_barrio' => $barrio->id,
                            ]);
                        }
                    }
                }
            }
            /*SUB-BARRIOS*/

            DB::commit();

            return response()->json('Sincronizado correctamente', 200);
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Ha ocurrido un error en PaisesController: ' . $e->getMessage() . ', Linea: ' . $e->getLine());

            return response()->json(['message' => 'Ha ocurrido un error al tratar de guardar los datos.',], 500);
        }
    }
}




