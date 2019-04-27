<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FondoDeComercio extends Model
{
    use SoftDeletes;
    protected $table = 'tb_fondo_de_comercios';
    protected $primaryKey = 'idFondoComercio';

    protected $fillable = [
        'Direccion_Pais_Id1',
        'Direccion_Provincia_Id1',
        'Direccion_Partido_Id1',
        'Direccion_Localidad_Id1',
        'Direccion_Ciudad_Id1',
        'Direccion_Barrio_Id1',
        'Direccion_Subbarrio_Id',
        'Direccion_Calle_Id1',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'SuperficieTerreno',
        'SuperficiePlaya',
        'SuperficieDeposito',
        'SuperficieLocal',
        'Antiguedad',
        'fk_Estado',
        'ReferenciaCercana',
        'CantidadBanos',
        'Vivienda',
        'Expensas',
        'CantidadCocheras',
        'CantidadAmbientes',
        'AntiguedadComercio',
        'RecaudacionMensual',
        'Local',
        'VentaMercaderia',
        'MetrosDeLaEsquina',
        'fk_TipoFondoComercio',
        'Ambientes_Cocina',
        'Ambientes_Comedor',
        'Ambientes_Deposito',
        'Ambientes_Galpon',
        'Ambientes_Garage',
        'Ambientes_Oficina',
        'Ambientes_Vestidor',
        'Servicios_Rentas',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

}
