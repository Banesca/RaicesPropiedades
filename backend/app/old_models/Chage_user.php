<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Chage_user extends Model {

    protected $table      = 'tb_chage_users';
    protected $primaryKey = 'idChageUser';

    protected $fillable = [
        'idUser',
        'idCuponsClient',
    ];
}
