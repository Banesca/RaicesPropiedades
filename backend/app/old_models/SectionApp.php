<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectionApp extends Model
{

    use SoftDeletes;
    protected $table = 'tb_secctionapp';
    protected $primaryKey = 'idSecctionApp';

    protected $fillable = [
        'tag'
    ];
}
