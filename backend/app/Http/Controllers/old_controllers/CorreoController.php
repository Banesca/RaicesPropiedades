<?php

namespace App\Http\Controllers;

use App\Correo;
use App\Mail\Prueba;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Mail;

class CorreoController extends Controller
{
    public function enviarCorreo(){

        $users = User::get();

        foreach ($users as $user){

            Mail::to($user->email)->send(new Prueba($user,'123456'));

        }

    }
}
