<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StatusSistema;

class StatusSistemaController extends Controller
{
    public function index(){
    	return StatusSistema::get();
    }
}
