<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ConfigHome extends Model
{
    use SoftDeletes;
    protected $table = 'tb_config_homes';
    protected $primaryKey = 'idConfigHome';

    protected $fillable = [
        'color',
        'logo'
    ];
}
