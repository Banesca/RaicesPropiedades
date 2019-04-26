<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Departamento extends Model
{
    use SoftDeletes;
    protected $table      = 'tb_departamentos';
    protected $primaryKey = 'idDepartamento';

    protected $fillable = [
        'Direccion_Pais_Id1',
        'Direccion_Provincia_Id1',
        'Direccion_Partido_Id1',
        'Direccion_Localidad_Id1',
        'Direccion_Ciudad_Id1',
        'Direccion_Barrio_Id1',
        'Direccion_SubBarrio_Id1',
        'Direccion_Calle_Id1',
        'Direccion_Nombrecalle',
        'Direccion_Numero',
        'Direccion_Piso',
        'Direccion_Departamento',
        'Direccion_Coordenadas_Latitud',
        'Direccion_Coordenadas_Longitud',
        'AptoCredito',
        'LongitudFrente',
        'LongitudFondo',
        'SuperficieCubierta',
        'SuperficieDescubierta',
        'Antiguedad',
        'AptoProfesional',
        'CantidadCocheras',
        'CocheraOptativa',
        'Disposicion',
        'Expensas',
        'Orientacion',
        'PropiedadOcupada',
        'TipoBalcon',
        'TipoExpensas',
        'TipoVista',
        'TipoCosta',
        'TipoUnidad',
        'Estado',
        'CantidadBanos',
        'CantidadAmbientes',
        'CantidadDormitorios',
        'Ambientes_Altillo',
        'Ambientes_Antesala',
        'Ambientes_Balcon',
        'Ambientes_Bano',
        'Ambientes_Bar',
        'Ambientes_Baulera',
        'Ambientes_Biblioteca',
        'Ambientes_Circulacion',
        'Ambientes_Cochera',
        'Ambientes_Cocina',
        'Ambientes_CocinaComedor',
        'Ambientes_CocinaKitchinette',
        'Ambientes_Comedor',
        'Ambientes_ComedorDiario',
        'Ambientes_CuartoDePlanchar',
        'Ambientes_Dependencia',
        'Ambientes_DependenciaDeServicio',
        'Ambientes_Dormitorio',
        'Ambientes_Entrepiso',
        'Ambientes_Escritorio',
        'Ambientes_Estudio',
        'Ambientes_FamilyRoom',
        'Ambientes_Hall',
        'Ambientes_Jardin',
        'Ambientes_Lavadero',
        'Ambientes_Living',
        'Ambientes_LivingComedor',
        'Ambientes_Palier',
        'Ambientes_Patio',
        'Ambientes_Playroom',
        'Ambientes_Recepcion',
        'Ambientes_Sotano',
        'Ambientes_Suite',
        'Ambientes_Terraza',
        'Ambientes_Toilette',
        'Ambientes_Vestidor',
        'Instalaciones_AguaCaliente',
        'Instalaciones_AguaCalienteCentral',
        'Instalaciones_AguaCorriente',
        'Instalaciones_AireAcondicionadoIndividual',
        'Instalaciones_Amoblado',
        'Instalaciones_Ascensor',
        'Instalaciones_AscensoresDeServicio',
        'Instalaciones_AscensoresPrincipales',
        'Instalaciones_Cable',
        'Instalaciones_CajaFuerte',
        'Instalaciones_Caldera',
        'Instalaciones_Calefaccion',
        'Instalaciones_CanchaFutbol',
        'Instalaciones_CanchaTenis',
        'Instalaciones_Desayunador',
        'Instalaciones_Electricidad',
        'Instalaciones_ExtractorDeAire',
        'Instalaciones_GasEnvasado',
        'Instalaciones_GasNatural',
        'Instalaciones_HogarALena',
        'Instalaciones_InstalacionParrilla',
        'Instalaciones_LosaRadiante',
        'Instalaciones_MueblesDeCocina',
        'Instalaciones_MovilidadReducida',
        'Instalaciones_Pavimento',
        'Instalaciones_Solarium',
        'Instalaciones_Telefono',
        'Instalaciones_Termotanque',
        'Servicios_ABL',
        'Servicios_AguaCorriente',
        'Servicios_Calefaccion',
        'Servicios_Electricidad',
        'Servicios_GasEnvasado',
        'Servicios_GasNatural',
        'Servicios_Internet',
        'Servicios_Limpieza',
        'Servicios_Refrigeracion',
        'Servicios_Rentas',
        'Servicios_RopaCama',
        'Servicios_Seguridad',
        'Servicios_Telefono',
        'Servicios_Toallas',
        'Servicios_Videocable',
        'Servicios_Vigilancia',
        'Generales_PermiteMascotas',
        'Generales_SeguroCaucion',
        'Edificio_TipoEdificio',
        'Edificio_Estado',
        'Edificio_CantidadCocheras',
        'Edificio_PropiedadOcupada',
        'Edificio_Antiguedad',
        'Edificio_DepartamentosPorPiso',
        'Edificio_CantidadPisos',
        'Edificio_SuperficiePlaya',
        'Edificio_SuperficieDeposito',
        'Edificio_LongitudFrente',
        'Edificio_LongitudFondo',
        'Edificio_TipoFrente',
        'Edificio_TipoVista',
        'Edificio_TipoCosta',
        'Edificio_Disponibilidad',
        'Edificio_Servicios_ABL',
        'Edificio_Servicios_AguaCorriente',
        'Edificio_Servicios_Bar',
        'Edificio_Servicios_Calefaccion',
        'Edificio_Servicios_Cocina',
        'Edificio_Servicios_Conmutador',
        'Edificio_Servicios_Electricidad',
        'Edificio_Servicios_GasEnvasado',
        'Edificio_Servicios_GasNatural',
        'Edificio_Servicios_Internet',
        'Edificio_Servicios_Lavanderia',
        'Edificio_Servicios_Refrigeracion',
        'Edificio_Servicios_Rentas',
        'Edificio_Servicios_Seguridad',
        'Edificio_Servicios_Telefono',
        'Edificio_Servicios_Videocable',
        'Edificio_Servicios_Vigilancia',
        'Edificio_Instalaciones_AireAcondicionadoCentral',
        'Edificio_Instalaciones_Ascensor',
        'Edificio_Instalaciones_Caldera',
        'Edificio_Instalaciones_EspacioParaVehiculo',
        'Edificio_Instalaciones_Gimnasio',
        'Edificio_Instalaciones_GrupoElectrogeno',
        'Edificio_Instalaciones_JuegosParaChicos',
        'Edificio_Instalaciones_Laundry',
        'Edificio_Instalaciones_Pileta',
        'Edificio_Instalaciones_SalonDeFiestas',
        'Edificio_Instalaciones_Sauna',
        'Edificio_Instalaciones_Termotanque',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];



































































































































































}
