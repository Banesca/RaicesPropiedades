<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedesSocial extends Model
{
    use SoftDeletes;
    protected $table = 'tb_redes_socials';
    protected $primaryKey = 'id_redSocial';

    protected $fillable = [
        'url_face',
        'url_twit',
        'url_inst',
        'url_what',
        'msj_what',
    ];
}
