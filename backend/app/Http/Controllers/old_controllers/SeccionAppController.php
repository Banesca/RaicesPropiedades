<?php

namespace App\Http\Controllers;

use App\SectionApp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeccionAppController extends Controller
{
    public function listar()
    {
        $s=SectionApp::get();
        $response = [
            'msj'   => 'Lista',
            'users' => $s,
        ];

        return response()->json($response, 202);
    }
}
