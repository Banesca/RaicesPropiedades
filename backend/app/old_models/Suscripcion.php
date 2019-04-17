<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Suscripcion extends Model
{
    use SoftDeletes;

    protected $table = 'tb_suscripcions';

    protected $primaryKey = 'idSuscripcion';

    protected $fillable = [
        'email',
        'motivoDeCancelacion',
        'fk_idStatusSistema',
        'tocken',
        'sugerencia'
    ];


    public function generateToken() {
        $this->tocken = str_random(60);
        $this->save();

        return $this->tocken;
    }

    public function estatusSitema()
    {
        return $this->belongsTo('App\StatusSistema', 'fk_idStatusSistema');
    }
}
