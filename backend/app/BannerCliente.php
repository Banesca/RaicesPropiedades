<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BannerCliente extends Model {
    protected $table      = 'tb_banner_clientes';
    protected $primaryKey = 'idBannerCliente';

    protected $fillable = [
        'dir_imagen',
        'fk_idUser',
        'orden',
    ];
    protected $hidden   = [
        'created_at',
        'updated_at',
    ];
}
