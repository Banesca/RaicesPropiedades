<?php

use App\Mail\PagoConTarjetaMail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function() {
    return view('welcome');
});

Route::get('mail', function() {

    $titulo      = "TITULO DEL EMAIL _____________________________________ ";
    $descripcion = "
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis distinctio omnis reprehenderit hic, quaerat ducimus temporibus sint molestiae veniam quam, repudiandae perferendis modi eveniet nesciunt doloremque quos libero qui fugit.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis distinctio omnis reprehenderit hic, quaerat ducimus temporibus sint molestiae veniam quam, repudiandae perferendis modi eveniet nesciunt doloremque quos libero qui fugit.</p>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nobis distinctio omnis reprehenderit hic, quaerat ducimus temporibus sint molestiae veniam quam, repudiandae perferendis modi eveniet nesciunt doloremque quos libero qui fugit.</p>";

    return view('correos.formato-email')->with('titulo', $titulo)->with('descripcion', $descripcion);
    //Mail::to('alecortez240192@gmail.com')->send(new PagoConTarjetaMail($titulo,$descripcion));

});

Route::get('pedidos', function() {
    return view('pedidos');
});
Route::get('email', function() {


    Mail::raw('Tu contraseña es', function($mensaje) {
        $mensaje->from('us@example.com', 'Laravel');
        $mensaje->to('alecortez240192@gmail.com')->subject('Your Reminder!');
    });
    return 'Email enviado';
});

Route::get('formCancelarSuscripcion/{tocken}', function($e) {

        if (is_null(\App\Suscripcion::where('tocken', $e)->first())) {
            $response = [
                'msj' => 'No existe la suscripcion',
            ];
            return response()->json($response, 404);
        }

    return view('cancelacionSuscripcion.index')->with('tocken',$e);
});

Route::get('irtienda',function(){
    return Redirect::to('http://raicesonline.com.ar/front/');
});

Route::get('hola',function(){
   return view('correos.activar-cuenta');
});





