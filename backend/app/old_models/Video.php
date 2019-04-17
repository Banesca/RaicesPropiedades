<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'tb_videos';

    protected $fillable = [
        'titulo',
        'url',
        'fk_idUser',
        'fk_idStatusSistema'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'fk_idUser');
    }
    public function statu()
    {
        return $this->belongsTo('App\StatusSistema', 'fk_idStatusSistema');
    }
}
