export interface IPublicacion {
    //1er Step
    titulo: string;
    fk_estado_publicacion: number;
    descipcion: string;
    fk_tipoPropiedad: number;
    esUnaOportunidad: number;
    esUnaNovedad: number;
    aparece_en_galeria: number;

    //2do Step
    imagen_para_galeria?: any;
    imagen1: any;
    imagen2?: any;
    imagen3?: any;
    imagen4?: any;
    imagen5?: any;
    imagen6?: any;
    imagen7?: any;



    //3er Step
    //Datos Generales
    //Tipo de Unidad
    fk_TipoUnidadDepartamento?: number;
    fk_TipoUnidadCasa?: number;
    fk_TipoCochera?: number;
    fk_TipoLocal?: number;
    fk_TipoHotel?: number;
    fk_TipoTerreno?: number;
    fk_TipoCampo?: number;
    fk_TipoFondoComercio?: number;

    fk_idTipoOperaion: number;
    precio: number;
    fk_idMonedas: number;
    no_publicar_precio_inter: number;
    /**
     * Estado de Propiedad
     */
    fk_Estado: number;
    //Comision
    comision: string;
    
    //Ubicacion
    fk_Direccion_Pais_Id: number;
    fk_Direccion_Provincia_Id: number;
    fk_Direccion_Partido_Id: number;
    fk_Direccion_Localidad_Id: number;

    fk_Direccion_Ciudad_Id?: number;
    fk_Direccion_Barrio_Id?: number;
    fk_Direccion_SubBarrio_Id?: number;
    fk_Direccion_Calle_Id?: number;



    /*
    'fk_idTipoPropiedad',
    'Agricultura',
    'AltoEntrada',
    'Altura',
    'AlturaTecho',
    'Ambientes_Altillo',
    'Ambientes_AnteCocina',
    'Ambientes_Antesala',
    'Ambientes_Archivo',
    'Ambientes_Azotea',
    'Ambientes_Balcon',
    'Ambientes_Bano',
    'Ambientes_Bar',
    'Ambientes_Baulera',
    'Ambientes_Biblioteca',
    'Ambientes_Bodega',
    'Ambientes_Circulacion',
    'Ambientes_Cochera',
    'Ambientes_Cocina',
    'Ambientes_CocinaComedor',
    'Ambientes_CocinaKitchinette',
    'Ambientes_Comedor',
    'Ambientes_ComedorDiario',
    'Ambientes_CuartoDeHerramientas',
    'Ambientes_CuartoDePlanchar',
    'Ambientes_Dependencia',
    'Ambientes_DependenciaDeServicio',
    'Ambientes_Deposito',
    'Ambientes_Dormitorio',
    'Ambientes_Entrepiso',
    'Ambientes_Escritorio',
    'Ambientes_Estudio',
    'Ambientes_FamilyRoom',
    'Ambientes_Galeria',
    'Ambientes_Galpon',
    'Ambientes_Garage',
    'Ambientes_Hall',
    'Ambientes_Jardin',
    'Ambientes_Lavadero',
    'Ambientes_Living',
    'Ambientes_LivingComedor',
    'Ambientes_Local',
    'Ambientes_Oficina',
    'Ambientes_Palier',
    'Ambientes_Patio',
    'Ambientes_Playroom',
    'Ambientes_Quincho',
    'Ambientes_Recepcion',
    'Ambientes_Sala',
    'Ambientes_Sotano',
    'Ambientes_Suite',
    'Ambientes_Terraza',
    'Ambientes_Toilette',
    'Ambientes_Vestibulo',
    'Ambientes_Vestidor',
    'Ambientes_Vestuario',
    'Ancho',
    'AnchoEntrada',
    'Antiguedad',
    'AntiguedadComercio',
    'AptoCredito',
    'AptoProfesional',
    'Baulera',
    'CantidadAmbientes',
    'CantidadBanos',
    'CantidadCocheras',
    'CantidadColumnas',
    'CantidadCubiertos',
    'CantidadDormitorios',
    'CantidadEstrellas',
    'CantidadHabitaciones',
    'CantidadHectareas',
    'CantidadNaves',
    'CantidadOficinas',
    'CantidadPersonal',
    'CantidadPisos',
    'CantidadPlantas',
    'CantidadPlazas',
    'CasaCaseros',
    'CasaPrincipal',
    'CocheraOptativa',
    'cupada',
    'Demolicion',
    'DepartamentosPorPiso',
    'Direccion_Coordenadas_Latitud',
    'Direccion_Coordenadas_Longitud',
    'Direccion_Departamento',
    'Direccion_Nombrecalle',
    'Direccion_Numero',
    'Direccion_Piso',
    'Disponibilidad',
    'DistanciaPavimento',
    'EnEdificio',
    'Estado',
    'Expensas',
   
    'fk_Disposicion',
    'fk_Estado',
    'fk_Orientacion',
    'fk_TipoAcceso',
    'fk_TipoAscensor',
    'fk_TipoBalcon',
    'fk_TipoBano',
    'fk_TipoCalefaccion',
    'fk_TipoCampo',
    'fk_TipoCobertura',
    'fk_TipoCoche',
    'fk_TipoCochera',
    'fk_TipoCosta',
    'fk_TipoEdificio',
    'fk_TipoExpensas',
    'fk_TipoFondoComercio',
    'fk_TipoFrente',
    'fk_TipoHotel',
    'fk_TipoLocal',
    'fk_TipoPendiente',
    'fk_TipoPiso',
    'fk_TipoPorton',
    'fk_TipoTecho',
    'fk_TipoTechoIndustrial',
    'fk_TipoTerreno',
    'fk_TipoUnidad',
    'fk_TipoVista',
    'FondoIrregular',
    'FOT',
    'FrenteIrregular',
    'GaleriaShopping',
    'Ganaderia',
    'GeneradorPropio',
    'Generales_PermiteMascotas',
    'Generales_SeguroCaucion',
    'HabitacionesPorPiso',
    'Instalaciones_AguaCaliente',
    'Instalaciones_AguaCalienteCentral',
    'Instalaciones_AguaCloaca',
    'Instalaciones_AguaCorriente',
    'Instalaciones_Aguadas',
    'Instalaciones_AguaPozo',
    'Instalaciones_AireAcondicionadoCentral',
    'Instalaciones_AireAcondicionadoIndividual',
    'Instalaciones_AireCaliente',
    'Instalaciones_AlambradoPerimetral',
    'Instalaciones_Alambrados',
    'Instalaciones_Amoblado',
    'Instalaciones_Arboleda',
    'Instalaciones_ArtefactosDeCocina',
    'Instalaciones_Ascensor',
    'Instalaciones_AscensoresDeServicio',
    'Instalaciones_AscensoresPrincipales',
    'Instalaciones_Balanza',
    'Instalaciones_Bebedero',
    'Instalaciones_Bombeador',
    'Instalaciones_Boxes',
    'Instalaciones_Bretes',
    'Instalaciones_Cable',
    'Instalaciones_CajaFuerte',
    'Instalaciones_Caldera',
    'Instalaciones_Calefaccion',
    'Instalaciones_CanchaDeBasquet',
    'Instalaciones_CanchaDeFutbol',
    'Instalaciones_CanchaDeHockey',
    'Instalaciones_CanchaDePaddle',
    'Instalaciones_CanchaDePaleta',
    'Instalaciones_CanchaDeSquash',
    'Instalaciones_CanchaDeTenis',
    'Instalaciones_CanchaDeVoley',
    'Instalaciones_CanchaFutbol',
    'Instalaciones_CanchaTenis',
    'Instalaciones_Corral',
    'Instalaciones_Desayunador',
    'Instalaciones_Electricidad',
    'Instalaciones_EspacioParaVehiculo',
    'Instalaciones_Estacada',
    'Instalaciones_ExtractorDeAire',
    'Instalaciones_Forestacion',
    'Instalaciones_Fosas',
    'Instalaciones_FuerzaMotriz',
    'Instalaciones_GasEnvasado',
    'Instalaciones_GasIndustrial',
    'Instalaciones_GasNatural',
    'Instalaciones_Gimnasio',
    'Instalaciones_Grua',
    'Instalaciones_GrupoElectrogeno',
    'Instalaciones_Haras',
    'Instalaciones_Hidromasaje',
    'Instalaciones_HogarALena',
    'Instalaciones_InstalacionParrilla',
    'Instalaciones_JuegosParaChicos',
    'Instalaciones_Laundry',
    'Instalaciones_LosaRadiante',
    'Instalaciones_LuzElectrica',
    'Instalaciones_Mangas',
    'Instalaciones_Molino',
    'Instalaciones_Montacarga',
    'Instalaciones_Motores',
    'Instalaciones_MovilidadReducida',
    'Instalaciones_MueblesDeCocina',
    'Instalaciones_Pavimento',
    'Instalaciones_Pileta',
    'Instalaciones_Porton',
    'Instalaciones_Potrero',
    'Instalaciones_Radiadores',
    'Instalaciones_SalonDeFiestas',
    'Instalaciones_Sauna',
    'Instalaciones_Solarium',
    'Instalaciones_Tambo',
    'Instalaciones_TanqueDeAgua',
    'Instalaciones_TanqueDeIncendio',
    'Instalaciones_Telefono',
    'Instalaciones_Termotanque',
    'Instalaciones_TratamientoEfluentes',
    'Instalaciones_Vivienda',
    'Largo',
    'LateralDerechoIrregular',
    'LateralIzquierdoIrregular',
    'Local',
    'LongitudFondo',
    'LongitudFrente',
    'MedidaLinealDerecha',
    'MedidaLinealIzquierda',
    'MetrosDeLaEsquina',
    'MontoExpensas',
    'Ocupada',
    'PropiedadOcupada',
    'RecaudacionMensual',
    'Reciclado',
    'ReferenciaCercana',
    'RentabilidadAnual',
    'Servicios_ABL',
    'Servicios_AguaCorriente',
    'Servicios_Bar',
    'Servicios_Calefaccion',
    'Servicios_Cocina',
    'Servicios_Conmutador',
    'Servicios_Electricidad',
    'Servicios_GasEnvasado',
    'Servicios_GasNatural',
    'Servicios_Internet',
    'Servicios_Lavanderia',
    'Servicios_Limpieza',
    'Servicios_Refrigeracion',
    'Servicios_Rentas',
    'Servicios_RopaCama',
    'Servicios_Seguridad',
    'Servicios_Telefono',
    'Servicios_Toallas',
    'Servicios_Videocable',
    'Servicios_Vigilancia',
    'SuperficieConstruible',
    'SuperficieCubierta',
    'SuperficieCubiertaCasa',
    'SuperficieDeposito',
    'SuperficieDescubierta',
    'SuperficieLocal',
    'SuperficieOficina',
    'SuperficiePlanta',
    'SuperficiePlaya',
    'SuperficieTerreno',
    'SuperficieTotal',
    'TerrenoPropio',
    'UltimaActividad',
    'VentaMercaderia',
    'Vidriera',
    'Vivienda',
    'Zonificacion',
    'fk_ficha2',

    'a_estrenar',
    'no_publicar_precio_inter',
    'informacion_adicional',

    'esUnaPropiedad',

    'apareceEnGaleriaInicia',

    'fk_idMonedas',

    'tipo_publicacion',
    
   */
}