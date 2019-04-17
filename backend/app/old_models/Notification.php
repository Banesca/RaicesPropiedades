<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use SoftDeletes;

    protected $table = 'tb_notification';

    protected $primaryKey = 'idNotification';

    protected $fillable = [
        'titleNotification',
        'descriptionNotification',
        'fk_idSecctionApp',
        'fk_idUser',
        'isConfirm',
    ];

    protected $hidden = [
        'created_at',
        'deleted_at',
        'updated_at',
    ];

}
