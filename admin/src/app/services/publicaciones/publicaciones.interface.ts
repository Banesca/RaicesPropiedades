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

    //Ubicacion
    fk_Direccion_Pais_Id: number;
    fk_Direccion_Provincia_Id: number;
    fk_Direccion_Partido_Id: number;
    fk_Direccion_Region_Id: number;
    fk_Direccion_Localidad_Id: number;

    fk_Direccion_Ciudad_Id?: number;
    fk_Direccion_Barrio_Id?: number;
    fk_Direccion_SubBarrio_Id?: number;
    Direccion_Nombrecalle?: string;
    Direccion_Numero?: string;
    Direccion_Piso?: string;
    Direccion_Departamento?: string;
    Direccion_Coordenadas_Latitud?: number;
    Direccion_Coordenadas_Longitud?: number;
    fk_idTipoOperaion: number;
    precio: number;
    fk_idMonedas: number;
    no_publicar_precio_inter: number;
    /**
     * Estado de Propiedad
     */
    fk_Estado: number;

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

    //Comision
    comision: string;

    //Características
    Altura?: number;
    Ancho?: number;
    Agricultura?: boolean,
    AltoEntrada?: number,
    AlturaTecho?: number;
    AnchoEntrada?: number;
    Antiguedad?: number;
    AntiguedadComercio?: number;
    AptoCredito?: boolean;
    AptoProfesional?: boolean;
    CantidadAmbientes?: number;
    CantidadBanos?: number;
    CantidadCocheras?: number;
    CantidadColumnas?: number;
    CantidadCubiertos?: number;
    CantidadDormitorios?: number;
    CantidadEstrellas?: number;
    CantidadHabitaciones?: number;
    CantidadHectareas?: number;
    CantidadNaves?: number;
    CantidadOficinas?: number;
    CantidadPersonal?: number;
    CantidadPisos?: number;
    CantidadPlantas?: number;
    CantidadPlazas?: number;
    CocheraOptativa?: boolean;
    cupada?: boolean;
    Demolicion?: boolean;
    DepartamentosPorPiso?: number;
    fk_Disposicion?: number;


    //Ambientes
    Ambientes_Altillo?: boolean;
    Ambientes_AnteCocina?: boolean;
    Ambientes_Antesala?: boolean;
    Ambientes_Archivo?: boolean;
    Ambientes_Azotea?: boolean;
    Ambientes_Balcon?: boolean;
    Ambientes_Bano?: boolean;
    Ambientes_Bar?: boolean;
    Ambientes_Baulera?: boolean;
    Ambientes_Biblioteca?: boolean;
    Ambientes_Bodega?: boolean;
    Ambientes_Circulacion?: boolean;
    Ambientes_Cochera?: boolean;
    Ambientes_Cocina?: boolean;
    Ambientes_CocinaComedor?: boolean;
    Ambientes_CocinaKitchinette?: boolean;
    Ambientes_Comedor?: boolean;
    Ambientes_ComedorDiario?: boolean;
    Ambientes_CuartoDeHerramientas?: boolean;
    Ambientes_CuartoDePlanchar?: boolean;
    Ambientes_Dependencia?: boolean;
    Ambientes_DependenciaDeServicio?: boolean;
    Ambientes_Deposito?: boolean;
    Ambientes_Dormitorio?: boolean;
    Ambientes_Entrepiso?: boolean;
    Ambientes_Escritorio?: boolean;
    Ambientes_Estudio?: boolean;
    Ambientes_FamilyRoom?: boolean;
    Ambientes_Galeria?: boolean;
    Ambientes_Galpon?: boolean;
    Ambientes_Garage?: boolean;
    Ambientes_Hall?: boolean;
    Ambientes_Jardin?: boolean;
    Ambientes_Lavadero?: boolean;
    Ambientes_Living?: boolean;
    Ambientes_LivingComedor?: boolean;
    Ambientes_Local?: boolean;
    Ambientes_Oficina?: boolean;
    Ambientes_Palier?: boolean;
    Ambientes_Patio?: boolean;
    Ambientes_Playroom?: boolean;
    Ambientes_Quincho?: boolean;
    Ambientes_Recepcion?: boolean;
    Ambientes_Sala?: boolean;
    Ambientes_Sotano?: boolean;
    Ambientes_Suite?: boolean;
    Ambientes_Terraza?: boolean;
    Ambientes_Toilette?: boolean;
    Ambientes_Vestibulo?: boolean;
    Ambientes_Vestidor?: boolean;
    Ambientes_Vestuario?: boolean;


    //Instalaciones
    Instalaciones_AguaCaliente?: boolean;
    Instalaciones_AguaCalienteCentral?: boolean;
    Instalaciones_AguaCloaca?: boolean;
    Instalaciones_AguaCorriente?: boolean;
    Instalaciones_Aguadas?: boolean;
    Instalaciones_AguaPozo?: boolean;
    Instalaciones_AireAcondicionadoCentral?: boolean;
    Instalaciones_AireAcondicionadoIndividual?: boolean;
    Instalaciones_AireCaliente?: boolean;
    Instalaciones_AlambradoPerimetral?: boolean;
    Instalaciones_Alambrados?: boolean;
    Instalaciones_Amoblado?: boolean;
    Instalaciones_Arboleda?: boolean;
    Instalaciones_ArtefactosDeCocina?: boolean;
    Instalaciones_Ascensor?: boolean;
    Instalaciones_AscensoresDeServicio?: boolean;
    Instalaciones_AscensoresPrincipales?: boolean;
    Instalaciones_Balanza?: boolean;
    Instalaciones_Bebedero?: boolean;
    Instalaciones_Bombeador?: boolean;
    Instalaciones_Boxes?: boolean;
    Instalaciones_Bretes?: boolean;
    Instalaciones_Cable?: boolean;
    Instalaciones_CajaFuerte?: boolean;
    Instalaciones_Caldera?: boolean;
    Instalaciones_Calefaccion?: boolean;
    Instalaciones_CanchaDeBasquet?: boolean;
    Instalaciones_CanchaDeFutbol?: boolean;
    Instalaciones_CanchaDeHockey?: boolean;
    Instalaciones_CanchaDePaddle?: boolean;
    Instalaciones_CanchaDePaleta?: boolean;
    Instalaciones_CanchaDeSquash?: boolean;
    Instalaciones_CanchaDeTenis?: boolean;
    Instalaciones_CanchaDeVoley?: boolean;
    Instalaciones_CanchaFutbol?: boolean;
    Instalaciones_CanchaTenis?: boolean;
    Instalaciones_Corral?: boolean;
    Instalaciones_Desayunador?: boolean;
    Instalaciones_Electricidad?: boolean;
    Instalaciones_EspacioParaVehiculo?: boolean;
    Instalaciones_Estacada?: boolean;
    Instalaciones_ExtractorDeAire?: boolean;
    Instalaciones_Forestacion?: boolean;
    Instalaciones_Fosas?: boolean;
    Instalaciones_FuerzaMotriz?: boolean;
    Instalaciones_GasEnvasado?: boolean;
    Instalaciones_GasIndustrial?: boolean;
    Instalaciones_GasNatural?: boolean;
    Instalaciones_Gimnasio?: boolean;
    Instalaciones_Grua?: boolean;
    Instalaciones_GrupoElectrogeno?: boolean;
    Instalaciones_Haras?: boolean;
    Instalaciones_Hidromasaje?: boolean;
    Instalaciones_HogarALena?: boolean;
    Instalaciones_InstalacionParrilla?: boolean;
    Instalaciones_JuegosParaChicos?: boolean;
    Instalaciones_Laundry?: boolean;
    Instalaciones_LosaRadiante?: boolean;
    Instalaciones_LuzElectrica?: boolean;
    Instalaciones_Mangas?: boolean;
    Instalaciones_Molino?: boolean;
    Instalaciones_Montacarga?: boolean;
    Instalaciones_Motores?: boolean;
    Instalaciones_MovilidadReducida?: boolean;
    Instalaciones_MueblesDeCocina?: boolean;
    Instalaciones_Pavimento?: boolean;
    Instalaciones_Pileta?: boolean;
    Instalaciones_Porton?: boolean;
    Instalaciones_Potrero?: boolean;
    Instalaciones_Radiadores?: boolean;
    Instalaciones_SalonDeFiestas?: boolean;
    Instalaciones_Sauna?: boolean;
    Instalaciones_Solarium?: boolean;
    Instalaciones_Tambo?: boolean;
    Instalaciones_TanqueDeAgua?: boolean;
    Instalaciones_TanqueDeIncendio?: boolean;
    Instalaciones_Telefono?: boolean;
    Instalaciones_Termotanque?: boolean;
    Instalaciones_TratamientoEfluentes?: boolean;
    Instalaciones_Vivienda?: boolean;

    //Servicios
    Servicios_ABL?: boolean;
    Servicios_AguaCorriente?: boolean;
    Servicios_Bar?: boolean;
    Servicios_Calefaccion?: boolean;
    Servicios_Cocina?: boolean;
    Servicios_Conmutador?: boolean;
    Servicios_Electricidad?: boolean;
    Servicios_GasEnvasado?: boolean;
    Servicios_GasNatural?: boolean;
    Servicios_Internet?: boolean;
    Servicios_Lavanderia?: boolean;
    Servicios_Limpieza?: boolean;
    Servicios_Refrigeracion?: boolean;
    Servicios_Rentas?: boolean;
    Servicios_RopaCama?: boolean;
    Servicios_Seguridad?: boolean;
    Servicios_Telefono?: boolean;
    Servicios_Toallas?: boolean;
    Servicios_Videocable?: boolean;
    Servicios_Vigilancia?: boolean;
    /*
    
    
    
    

    
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