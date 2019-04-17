<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StateOrder extends Model
{
    use SoftDeletes;
    protected $table = 'tb_state_order';
    protected $primaryKey = 'idStateOrder';
    

    protected $fillable = [
        'StateOrder'
    ];
}
