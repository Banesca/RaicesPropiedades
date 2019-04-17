<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StatusNotificacion extends Model
{
    protected $table = 'tb_status_notificacions';
    protected $primaryKey = 'idStatusNoti';

    protected $fillable = [
        'descripcion',
    ];

    protected $hidden = [
        'idStatusNoti',
        'created_at',
        'deleted_at',
        'updated_at'
    ];
}
