<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryMp extends Model
{
    use SoftDeletes;
    protected $table = 'tb_history_mp';
    protected $primaryKey = 'idHistoryMp';

    protected $fillable = [
        'data',
        'fk_idOrderHeader',
    ];
}
