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
    fk_TipoTecho?: number;
    fk_TipoTerreno?: number;
    fk_TipoCampo?: number;
    fk_TipoFondoComercio?: number;

    //Comision
    comision: string;

    //Características
    Largo?: string,
    Ancho?: string,
    Altura?: number;
    Agricultura?: number,
    AltoEntrada?: number,
    AlturaTecho?: number;
    AnchoEntrada?: number;
    Antiguedad?: number;
    AntiguedadComercio?: number;
    AptoCredito?: number;
    AptoProfesional?: number;
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
    CocheraOptativa?: number;
    cupada?: number;
    Demolicion?: number;
    DepartamentosPorPiso?: number;
    Expensas?: string;

    fk_Disposicion?: number;
    fk_Orientacion?: number;
    fk_TipoBalcon?: number;
    fk_TipoExpensas?: number;
    fk_TipoVista?: number;
    fk_TipoCosta?: number;
    fk_TipoPiso?: number;
    fk_TipoPendiente?: number;
    fk_TipoCobertura?: number;
    fk_TipoCoche?: number;
    fk_TipoAcceso?: number;

    LongitudFondo?: number;
    LongitudFrente?: number;

    PropiedadOcupada?: number;
    SuperficieConstruible?: number;
    SuperficieCubierta?: number;
    SuperficieCubiertaCasa?: number;
    SuperficieDeposito?: number;
    SuperficieDescubierta?: number;
    SuperficieLocal?: number;
    SuperficieOficina?: number;
    SuperficiePlanta?: number;
    SuperficiePlaya?: number;
    SuperficieTerreno?: number;
    SuperficieTotal?: number;


    Generales_PermiteMascotas?: number;
    Generales_SeguroCaucion?: number;

    Baulera?: number;


    //Ambientes
    Ambientes_Altillo?: number;
    Ambientes_AnteCocina?: number;
    Ambientes_Antesala?: number;
    Ambientes_Archivo?: number;
    Ambientes_Azotea?: number;
    Ambientes_Balcon?: number;
    Ambientes_Bano?: number;
    Ambientes_Bar?: number;
    Ambientes_Baulera?: number;
    Ambientes_Biblioteca?: number;
    Ambientes_Bodega?: number;
    Ambientes_Circulacion?: number;
    Ambientes_Cochera?: number;
    Ambientes_Cocina?: number;
    Ambientes_CocinaComedor?: number;
    Ambientes_CocinaKitchinette?: number;
    Ambientes_Comedor?: number;
    Ambientes_ComedorDiario?: number;
    Ambientes_CuartoDeHerramientas?: number;
    Ambientes_CuartoDePlanchar?: number;
    Ambientes_Dependencia?: number;
    Ambientes_DependenciaDeServicio?: number;
    Ambientes_Deposito?: number;
    Ambientes_Dormitorio?: number;
    Ambientes_Entrepiso?: number;
    Ambientes_Escritorio?: number;
    Ambientes_Estudio?: number;
    Ambientes_FamilyRoom?: number;
    Ambientes_Galeria?: number;
    Ambientes_Galpon?: number;
    Ambientes_Garage?: number;
    Ambientes_Hall?: number;
    Ambientes_Jardin?: number;
    Ambientes_Lavadero?: number;
    Ambientes_Living?: number;
    Ambientes_LivingComedor?: number;
    Ambientes_Local?: number;
    Ambientes_Oficina?: number;
    Ambientes_Palier?: number;
    Ambientes_Patio?: number;
    Ambientes_Playroom?: number;
    Ambientes_Quincho?: number;
    Ambientes_Recepcion?: number;
    Ambientes_Sala?: number;
    Ambientes_Sotano?: number;
    Ambientes_Suite?: number;
    Ambientes_Terraza?: number;
    Ambientes_Toilette?: number;
    Ambientes_Vestibulo?: number;
    Ambientes_Vestidor?: number;
    Ambientes_Vestuario?: number;


    //Instalaciones
    Instalaciones_AguaCaliente?: number;
    Instalaciones_AguaCalienteCentral?: number;
    Instalaciones_AguaCloaca?: number;
    Instalaciones_AguaCorriente?: number;
    Instalaciones_Aguadas?: number;
    Instalaciones_AguaPozo?: number;
    Instalaciones_AireAcondicionadoCentral?: number;
    Instalaciones_AireAcondicionadoIndividual?: number;
    Instalaciones_AireCaliente?: number;
    Instalaciones_AlambradoPerimetral?: number;
    Instalaciones_Alambrados?: number;
    Instalaciones_Amoblado?: number;
    Instalaciones_Arboleda?: number;
    Instalaciones_ArtefactosDeCocina?: number;
    Instalaciones_Ascensor?: number;
    Instalaciones_AscensoresDeServicio?: number;
    Instalaciones_AscensoresPrincipales?: number;
    Instalaciones_Balanza?: number;
    Instalaciones_Bebedero?: number;
    Instalaciones_Bombeador?: number;
    Instalaciones_Boxes?: number;
    Instalaciones_Bretes?: number;
    Instalaciones_Cable?: number;
    Instalaciones_CajaFuerte?: number;
    Instalaciones_Caldera?: number;
    Instalaciones_Calefaccion?: number;
    Instalaciones_CanchaDeBasquet?: number;
    Instalaciones_CanchaDeFutbol?: number;
    Instalaciones_CanchaDeHockey?: number;
    Instalaciones_CanchaDePaddle?: number;
    Instalaciones_CanchaDePaleta?: number;
    Instalaciones_CanchaDeSquash?: number;
    Instalaciones_CanchaDeTenis?: number;
    Instalaciones_CanchaDeVoley?: number;
    Instalaciones_CanchaFutbol?: number;
    Instalaciones_CanchaTenis?: number;
    Instalaciones_Corral?: number;
    Instalaciones_Desayunador?: number;
    Instalaciones_Electricidad?: number;
    Instalaciones_EspacioParaVehiculo?: number;
    Instalaciones_Estacada?: number;
    Instalaciones_ExtractorDeAire?: number;
    Instalaciones_Forestacion?: number;
    Instalaciones_Fosas?: number;
    Instalaciones_FuerzaMotriz?: number;
    Instalaciones_GasEnvasado?: number;
    Instalaciones_GasIndustrial?: number;
    Instalaciones_GasNatural?: number;
    Instalaciones_Gimnasio?: number;
    Instalaciones_Grua?: number;
    Instalaciones_GrupoElectrogeno?: number;
    Instalaciones_Haras?: number;
    Instalaciones_Hidromasaje?: number;
    Instalaciones_HogarALena?: number;
    Instalaciones_InstalacionParrilla?: number;
    Instalaciones_JuegosParaChicos?: number;
    Instalaciones_Laundry?: number;
    Instalaciones_LosaRadiante?: number;
    Instalaciones_LuzElectrica?: number;
    Instalaciones_Mangas?: number;
    Instalaciones_Molino?: number;
    Instalaciones_Montacarga?: number;
    Instalaciones_Motores?: number;
    Instalaciones_MovilidadReducida?: number;
    Instalaciones_MueblesDeCocina?: number;
    Instalaciones_Pavimento?: number;
    Instalaciones_Pileta?: number;
    Instalaciones_Porton?: number;
    Instalaciones_Potrero?: number;
    Instalaciones_Radiadores?: number;
    Instalaciones_SalonDeFiestas?: number;
    Instalaciones_Sauna?: number;
    Instalaciones_Solarium?: number;
    Instalaciones_Tambo?: number;
    Instalaciones_TanqueDeAgua?: number;
    Instalaciones_TanqueDeIncendio?: number;
    Instalaciones_Telefono?: number;
    Instalaciones_Termotanque?: number;
    Instalaciones_TratamientoEfluentes?: number;
    Instalaciones_Vivienda?: number;

    //Servicios
    Servicios_ABL?: number;
    Servicios_AguaCorriente?: number;
    Servicios_Bar?: number;
    Servicios_Calefaccion?: number;
    Servicios_Cocina?: number;
    Servicios_Conmutador?: number;
    Servicios_Electricidad?: number;
    Servicios_GasEnvasado?: number;
    Servicios_GasNatural?: number;
    Servicios_Internet?: number;
    Servicios_Lavanderia?: number;
    Servicios_Limpieza?: number;
    Servicios_Refrigeracion?: number;
    Servicios_Rentas?: number;
    Servicios_RopaCama?: number;
    Servicios_Seguridad?: number;
    Servicios_Telefono?: number;
    Servicios_Toallas?: number;
    Servicios_Videocable?: number;
    Servicios_Vigilancia?: number;



    /** Edificio */
    //Servicios
    Edificio_Servicios_ABL?: number;
    Edificio_Servicios_AguaCorriente?: number;
    Edificio_Servicios_Bar?: number;
    Edificio_Servicios_Calefaccion?: number;
    Edificio_Servicios_Cocina?: number;
    Edificio_Servicios_Conmutador?: number;
    Edificio_Servicios_Electricidad?: number;
    Edificio_Servicios_GasEnvasado?: number;
    Edificio_Servicios_GasNatural?: number;
    Edificio_Servicios_Internet?: number;
    Edificio_Servicios_Lavanderia?: number;
    Edificio_Servicios_Refrigeracion?: number;
    Edificio_Servicios_Rentas?: number;
    Edificio_Servicios_Seguridad?: number;
    Edificio_Servicios_Telefono?: number;
    Edificio_Servicios_Videocable?: number;
    Edificio_Servicios_Vigilancia?: number;

}

export interface VistaPublicaciones {
    caracteristicas: any,
    ambientes: any,
    instalaciones: any,
    servicios: any,
    edificio?: {
        caracteristicas?: any,
        servicios?: any,
        instalaciones?: any
    }
}