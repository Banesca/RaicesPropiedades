<?php

namespace App;
use App\TipoPropiedad;
use Illuminate\Database\Eloquent\Model;

class Transacciones extends Model
{

    protected $table      = 'tb_transacciones';
    protected $primaryKey = 'idTransacciones';

    protected $fillable = [
        'nombre_apellido',
        'telefono',
        'fk_tipoPropiedad',
        'titulo',
        'descripcion',
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