<?php

namespace App;
use App\TipoPropiedad;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacciones extends Model
{

    use SoftDeletes;

    protected $table      = 'tb_transacciones';
    protected $primaryKey = 'idTransacciones';

    protected $fillable = [
        'nombre_apellido',
        'telefono',
        'fk_tipoPropiedad',
        'direccion',
        'descripcion',
        'email',
        'imagen_1',
        'imagen_2',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    
    public function tipoPropiedad()
    {
        return $this->belongsTo('App\TipoPropiedad', 'fk_tipoPropiedad');
    }




}