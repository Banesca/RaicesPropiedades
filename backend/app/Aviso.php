<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aviso extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_avisos';
    protected $primaryKey = 'idAviso';

    protected $fillable = [
        'EsWeb',
        'Titulo',
        'IdOrigen',
        'fk_SistemaOrigen_Id',
        'InformacionAdicional',
        'fk_TipoOperacion',
        'Vendedor_IdOrigen',
        'fk_Vendedor_Id',
        'fk_Vendedor_SistemaOrigen_Id',
        'Fotos_Url',
        'Video',
        'DatosContacto_Nombre',
        'DatosContacto_Apellido',
        'DatosContacto_email',
        'DatosContacto_Telefono',
        'DatosContacto_TelefonoAlternativo',
        'DatosContacto_celular',
        'DatosContacto_web',
        'DatosContacto_DisponibilidadAtencion',
        'Multimedia_Url',
        'fk_TipoMultimedia_Id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function TipoMultimedia()
    {
        return $this->belongsTo('App\TipoMultimedia', 'fk_TipoMultimedia_Id');
    }
}
