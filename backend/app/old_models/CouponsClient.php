<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CouponsClient extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_coupons_client';
    protected $primaryKey = 'idCuponsClient';

    protected $fillable = [
        'fk_idUser',
        'fk_idcoupons',
        'fk_idSatate'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'fk_idUser');
    }

    public function Coupons() {
        return $this->belongsTo('App\Coupons', 'fk_idcoupons');
    }

    public function status() {
        return $this->belongsTo('App\StatusSistema', 'fk_idSatate');
    }

    
}
