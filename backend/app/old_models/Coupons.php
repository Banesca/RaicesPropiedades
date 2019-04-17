<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Coupons extends Model {
    use SoftDeletes;
    protected $table      = 'tb_coupons';
    protected $primaryKey = 'idCoupons';

    protected $fillable = [
        'idProdcut',
        'fk_idSatate',
        'codeCoupns',
        'title',
        'description',
        'imagen',
        'dateExpired',
        'fk_idSatate',

        'tipo_descuento',
        'monto',
        'promo',

        'base_cond',
        'activar_uso',
    ];

    public function producto() {
        return $this->belongsTo('App\Producto', 'fk_idProducto');
    }

    public function status() {
        return $this->belongsTo('App\StatusSistema', 'fk_idSatate');
    }


    /*
        public function couponsClient() {
            return $this->hasMany('App\CouponsClient','fk_idUser'); //muchos cliente usan ese cupon

        }*/


}
