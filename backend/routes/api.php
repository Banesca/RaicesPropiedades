<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([ 'prefix' => 'auth' ], function() {

    Route::group([ 'middleware' => 'auth:api' ], function() {
        Route::get('logout', 'API\AuthController@logout');//cerrar sesion
        Route::get('getUser', 'API\AuthController@user');//Obtener usuarios autenticados
        Route::post('editarUser/{idUser}', 'UserController@update');
        Route::delete('borrarUser/{idUser}', 'UserController@destroy');

        Route::post('modulo/agregar', 'ModuloController@store');
        Route::post('modulo/editar/{idM}', 'ModuloController@update');
        Route::delete('modulo/borrar/{idM}', 'ModuloController@destroy');
        Route::post('usuario/asignarModulo', 'ModulosDelUserController@asignarModuloAUser');
        Route::delete('usuario/EliminarAsignacionModulo/{idMU}', 'ModulosDelUserController@eliminarAsignacion');
    });
});

Route::group([ 'prefix' => 'v1', 'middleware' => 'cors' ], function() {

    Route::post('login', 'API\AuthController@login'); //logear
    Route::post('crearUser', 'UserController@store');
    Route::post('listarUsers', 'UserController@listar');
    Route::post('buscadorPersonas', 'UserController@buscarPersonas');

    Route::post('modulo/listar', 'ModuloController@listar');
    Route::post('asinacion/modulos/listar', 'ModulosDelUserController@listar');
});





