<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactoDePropiedad extends Model
{
    use SoftDeletes;

    protected $table = 'tb_contacto_de_propiedads';

    protected $primaryKey = 'idContactoPropiedad';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'mensaje',
        'fk_idPropiedad',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function propiedad()
    {
        return $this->belongsTo('App\Propiedad', 'fk_idPropiedad');
    }
}
