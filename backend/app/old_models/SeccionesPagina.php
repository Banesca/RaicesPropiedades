<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeccionesPagina extends Model
{
    protected $table='tb_secciones_paginas';
    protected $fillable = ['nombre','link','modal','idElement'];

    public function slides(){
    	return $this->hasMany('App\Slide','id');
    }
}
