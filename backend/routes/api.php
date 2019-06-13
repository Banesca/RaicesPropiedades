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
        Route::delete('usuario/EliminarAsignacionModulo/{idModuloUser}', 'ModulosDelUserController@eliminarAsignacion');

        Route::post('config/agregarActualizar', 'ConfigGeneralController@storeOrUpdate');

        Route::post('addMail', 'MailController@addMail');
        Route::post('editMail/{idMail}', 'MailController@update');
        Route::delete('borrarMail/{idMail}', 'MailController@destroy');

        Route::post('sucursal/add', 'SucursalController@store');
        Route::post('sucursal/edit/{idSucursal}', 'SucursalController@update');
        Route::delete('sucursal/borrar/{idSucursal}', 'SucursalController@destroy');
        
    });
});

Route::group([ 'prefix' => 'v1', 'middleware' => 'cors' ], function() {

    Route::post('login', 'API\AuthController@login'); //logear
    Route::post('crearUser', 'UserController@store');
    Route::post('listarUsers', 'UserController@listar');
    Route::post('buscadorPersonas', 'UserController@buscarPersonas');

    Route::post('modulo/listar', 'ModuloController@listar');
    Route::post('asinacion/modulos/listar', 'ModulosDelUserController@listar');

    Route::get('config/get', 'ConfigGeneralController@getConfig');

    Route::get('listar/mails', 'MailController@listar');

    Route::post('sucursal/listar', 'SucursalController@listar');
    Route::get('sucursal/{id}', 'SucursalController@listarPorId');


    /*   crud del mail masivo    */
    Route::post('enviarMailMasivos', 'SuscripcionUserController@add'); // agregar
    Route::put('editarSuscripcion/{idSuscripcionUser}','SuscripcionUserController@editar'); //editar
    Route::delete('borrarSuscripcion/{idSuscripcionUser}','SuscripcionUserController@destroy'); //borrar
    Route::get('ListarMensajesMailMasivos', 'SuscripcionUserController@listar'); //listar
    /*   crud del mail masivo    */

    /*SUSCRIPCIONES*/
    Route::post('suscripcion/add','SuscripcionController@nuevaSus');
    Route::post('suscripcion/cambiarStatusSus/{id}','SuscripcionController@cambiarStatusSus');
    Route::post('suscripcion/cancelarSus/{id}','SuscripcionController@cancelarSus');
    Route::get('suscripcion/listarSuscripciones','SuscripcionController@listarSuscripciones');
    Route::get('suscripcion/listarSuscripcionesCanceladas','SuscripcionController@listarSuscripcionesCanceladas');
    Route::get('suscripcion/buscarSuscripcionPorEmail/{email}','SuscripcionController@buscarSuscripcionPorEmail');
    Route::post('suscripcion/cancelarSuscripcionTocken/{tocken}','SuscripcionController@cancelarSuscripcionTocken');
    /*SUSCRIPCIONES*/

    /*   Transacciones    */
    /*   Agregada 11/6/2019    */
    Route::post('transacciones/store','TransaccionesController@store');
    Route::get('transacciones/categorias','TransaccionesController@listaCategorias');
    /*   Transacciones    */

    /* Galeria */
    /*   Agregada 12/6/2019    */
    Route::get('galeria/galeria','GaleriaController@listaGaleria');
    Route::get('galeria/{id}', 'GaleriaController@listarGaleriaPorId');
    /* Galeria */

    Route::get('limpiar_cache', function () {
        Artisan::call(
            'cache:clear');
        Artisan::call('config:cache');
        //Artisan::call('vendor:publish');
        return response()->json('cache borrada y configurada');

    });

    Route::get('serve', function () {
        Artisan::call('serve --host=0.0.0.0 --port=8753');

        return response()->json('servidor iniciado puerto 8753');

    });

    Route::get('getStatusDelUser','ReturnSeedController@get_StatusDelUserSeeder');
    Route::get('getStatusSistema','ReturnSeedController@get_StatusSistemaSeeder');
    Route::get('getTipoTechoIndustrial','ReturnSeedController@get_TipoTechoIndustrialseeder');
    Route::get('getTipoMultimedia','ReturnSeedController@get_TipoMultimediaSeeder');
    Route::get('getTipoAscensor','ReturnSeedController@get_TipoAscensorSeeder');
    Route::get('getTipoCochera','ReturnSeedController@get_TipoCocheraSeeder');
    Route::get('getTipoHotel','ReturnSeedController@get_TipoHotelSeeder');
    Route::get('getOrientacion','ReturnSeedController@get_OrientacionSeeder');
    Route::get('getDisposicion','ReturnSeedController@get_DisposicionSeeder');
    Route::get('getTipoAcceso','ReturnSeedController@get_TipoAccesoSeeder');
    Route::get('getTipoCalefaccion','ReturnSeedController@get_TipoCalefaccionSeeder');
    Route::get('getTipoUnidadCasa','ReturnSeedController@get_TipoUnidadCasaSeeder');
    Route::get('getMonedas','ReturnSeedController@get_MonedasSeeder');
    Route::get('getTipoTecho','ReturnSeedController@get_TipoTechoSeeder');
    Route::get('getTipoPorton','ReturnSeedController@get_TipoPortonSeeder');
    Route::get('getModulosDelSistema','ReturnSeedController@get_ModulosDelSistemaSeeder');
    Route::get('getTipoPendiente','ReturnSeedController@get_TipoPendienteSeeder');
    Route::get('getEstadoPropiedad','ReturnSeedController@get_EstadoPropiedadSeeder');
    Route::get('getTipoBaño','ReturnSeedController@get_TipoBañoSeeder');
    Route::get('getTipoCobertura','ReturnSeedController@get_TipoCoberturaSeeder');
    Route::get('getTipoFondoComercio','ReturnSeedController@get_TipoFondoComercioSeeder');
    Route::get('getEstadoPublicacion','ReturnSeedController@get_EstadoPublicacionSeeder');
    Route::get('getTipoPropiedad','ReturnSeedController@get_TipoPropiedadSeeder');
    Route::get('getTipoCampp','ReturnSeedController@get_TipoCamppSeeder');
    Route::get('getTipoOperacion','ReturnSeedController@get_TipoOperacionSeeder');
    Route::get('getTipoFrente','ReturnSeedController@get_TipoFrenteSeeder');
    Route::get('getTipoCoche','ReturnSeedController@get_TipoCocheSeeder');
    Route::get('getTipoEdidificio','ReturnSeedController@get_TipoEdidificioSeeder');
    Route::get('getUsersTable','ReturnSeedController@get_UsersTableSeeder');
    Route::get('getTipoUnidadDepartamento','ReturnSeedController@get_TipoUnidadDepartamentoSeeder');
    Route::get('getTipoCosta','ReturnSeedController@get_TipoCostaSeeder');
    Route::get('getTipoVista','ReturnSeedController@get_TipoVistaSeeder');
    Route::get('getTipoTerreno','ReturnSeedController@get_TipoTerrenoSeeder');
    Route::get('getTipoBalcon','ReturnSeedController@get_TipoBalconSeeder');
    Route::get('getTipoExpensas','ReturnSeedController@get_TipoExpensasSeeder');
    Route::get('getTipoPiso','ReturnSeedController@get_TipoPisoSeeder');
    Route::get('getTipoLocal','ReturnSeedController@get_TipoLocalSeeder');

});





