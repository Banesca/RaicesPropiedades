<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mail_ extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_mails';
    protected $primaryKey = 'idMail';

    protected $fillable = [
        'email',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
