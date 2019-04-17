<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotificacionPorUser extends Model
{
    protected $table = 'tb_notificacion_por_users';

    protected $primaryKey = 'idNotiUser';

    protected $fillable = [
        'idUser',
        'status',
        'fk_idNotification',
    ];

    public function notificacion() {
        return $this->belongsTo('App\Notification', 'fk_idNotification');
    }
    public function status() {
        return $this->belongsTo('App\StatusNotificacion', 'status');
    }
    public function user() {
        return $this->belongsTo('App\User', 'idUser');
    }

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];
}
