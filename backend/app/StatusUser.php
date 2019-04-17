<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusUser extends Model {
    protected $table      = 'tb_status_users';
    protected $primaryKey = 'idStatus';

    protected $fillable = [
        'descripcion',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
