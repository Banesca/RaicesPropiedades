<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategoria extends Model
{
    use SoftDeletes;

    protected $table = 'tb_blog_categorias';

    protected $primaryKey = 'idBlogCategoria';

    protected $fillable = [
        'titulo',
        'imagen',
    ];
}
