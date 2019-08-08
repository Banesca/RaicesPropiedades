<?php

namespace App\Http\Controllers;

use App\ConfigGeneral;
use Illuminate\Http\Request;


class ConfigGeneralController extends Controller {

    public function storeOrUpdate(Request $request) {

        $config = ConfigGeneral::first();

        if (is_null($config)) {

            if ($request->exists('correo')) {

                $this->validate($request, [
                    'correo'       => 'email|required',
                    'quienesSomos' => 'required',
                    'direccion'    => 'required',
                    'celular1'     => 'required',
                    'celular2'     => 'required',
                    'url_face'     => 'required',
                    'url_intagram' => 'required',
                    'url_twitter'  => 'required',
                ], [
                    'correo.email'    => 'El Email debe de tener un formato ejemplo@ejemplo.com',
                    'correo.required' => 'El campo es requerido',
                    'quienesSomos'    => 'El campo es requerido',
                    'direccion'       => 'El campo es requerido',
                    'celular1'        => 'El campo es requerido',
                    'celular2'        => 'El campo es requerido',
                    'url_face'        => 'El campo es requerido',
                    'url_intagram'    => 'El campo es requerido',
                    'url_twitter'     => 'El campo es requerido',
                ]);
            }


            $n = new ConfigGeneral($request->all());
            $n->save();

            $response = [
                'msj'           => 'Config creada exitosamente',
                'configGeneral' => $n,
            ];

            return response()->json($response, 200);
        } else {

            if ($request->exists('correo')) {
                $this->validate($request, [
                    'correo' => 'email',
                ], [
                    'correo.email' => 'El Email debe de tener un formato ejemplo@ejemplo.com',
                ]);
            }

            $config->fill($request->all());
            $config->save();

            $response = [
                'msj'           => 'Config actualizada exitosamente',
                'configGeneral' => $config,
            ];

            return response()->json($response, 200);
        }
    }

    public function getConfig() {

        $config = ConfigGeneral::first();

        if(empty($config)){
            $response = [
                'configGeneral' => 'No existen registros',
            ]; 
        }else{
            $response = [
                'configGeneral' => $config,
            ];
        }
        return response()->json($response, 200);
    }
}
