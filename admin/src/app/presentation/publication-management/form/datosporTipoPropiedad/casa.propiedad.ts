import { isMedidas } from "../datosPorTipoPropiedad";


export const caracteristicasCasa = {
    LongitudFrente: true,
    LongitudFondo: true,
    SuperficieTerreno: true,
    SuperficieCubierta: true,
    SuperficieDescubierta: true,
    Antiguedad: true,
    fk_TipoTecho: true,
    fk_TipoPiso: true,
    CantidadPlantas: true,
    CantidadBanos: true,
    CantidadAmbientes: true,
    CantidadDormitorios: true,
    CantidadCocheras: true,
    fk_Orientacion: true,
    fk_TipoCosta: true,
    fk_TipoVista: true,
    fk_TipoPendiente: true,
    AptoCredito: true,
    Generales_PermiteMascotas: true,
    Generales_SeguroCaucion: true,
}


export const arrayAmbientesCasa = [
    { label: "Altillo", variableName: "Ambientes_Altillo", isMedidas: isMedidas("Altillo"), medidas: '', selected: false },
    { label: "Antecocina", variableName: "Ambientes_AnteCocina", isMedidas: isMedidas("Antecocina"), medidas: '', selected: false },
    { label: "Antesala", variableName: "Ambientes_Antesala", isMedidas: isMedidas("Antesala"), medidas: '', selected: false },
    { label: "Azotea", variableName: "Ambientes_Azotea", isMedidas: isMedidas("Azotea"), medidas: '', selected: false },
    { label: "Balcón", variableName: "Ambientes_Balcon", isMedidas: isMedidas("Balcon"), medidas: '', selected: false },
    { label: "Baño", variableName: "Ambientes_Bano", isMedidas: isMedidas("Bano"), medidas: '', selected: false },
    { label: "Bar", variableName: "Ambientes_Bar", isMedidas: isMedidas("Bar"), medidas: '', selected: false },
    { label: "Baulera", variableName: "Ambientes_Baulera", isMedidas: isMedidas("Baulera"), medidas: '', selected: false },
    { label: "Biblioteca", variableName: "Ambientes_Biblioteca", isMedidas: isMedidas("Biblioteca"), medidas: '', selected: false },
    { label: "Bodega", variableName: "Ambientes_Bodega", isMedidas: isMedidas("Bodega"), medidas: '', selected: false },
    { label: "Cochera", variableName: "Ambientes_Cochera", isMedidas: isMedidas("Cochera"), medidas: '', selected: false },
    { label: "Cocina", variableName: "Ambientes_Cocina", isMedidas: isMedidas("Cocina"), medidas: '', selected: false },
    { label: "Cocina Comedor", variableName: "Ambientes_CocinaComedor", isMedidas: isMedidas("CocinaComedor"), medidas: '', selected: false },
    { label: "Cocina Kitchinette", variableName: "Ambientes_CocinaKitchinette", isMedidas: isMedidas("CocinaKitchinette"), medidas: '', selected: false },
    { label: "Comedor", variableName: "Ambientes_Comedor", isMedidas: isMedidas("Comedor"), medidas: '', selected: false },
    { label: "Comedor Diario", variableName: "Ambientes_ComedorDiario", isMedidas: isMedidas("ComedorDiario"), medidas: '', selected: false },
    { label: "Cuarto De Herramientas", variableName: "Ambientes_CuartoDeHerramientas", isMedidas: isMedidas("CuartoDeHerramientas"), medidas: '', selected: false },
    { label: "Cuarto De Planchar", variableName: "Ambientes_CuartoDePlanchar", isMedidas: isMedidas("CuartoDePlanchar"), medidas: '', selected: false },
    { label: "Dependencia", variableName: "Ambientes_Dependencia", isMedidas: isMedidas("Dependencia"), medidas: '', selected: false },
    { label: "Dependencia De Servicio", variableName: "Ambientes_DependenciaDeServicio", isMedidas: isMedidas("DependenciaDeServicio"), medidas: '', selected: false },
    { label: "Dormitorio", variableName: "Ambientes_Dormitorio", isMedidas: isMedidas("Dormitorio"), medidas: '', selected: false },
    { label: "Entrepiso", variableName: "Ambientes_Entrepiso", isMedidas: isMedidas("Entrepiso"), medidas: '', selected: false },
    { label: "Estudio", variableName: "Ambientes_Estudio", isMedidas: isMedidas("Estudio"), medidas: '', selected: false },
    { label: "Family Room", variableName: "Ambientes_FamilyRoom", isMedidas: isMedidas("FamilyRoom"), medidas: '', selected: false },
    { label: "Galería", variableName: "Ambientes_Galeria", isMedidas: isMedidas("Galeria"), medidas: '', selected: false },
    { label: "Galpón", variableName: "Ambientes_Galpon", isMedidas: isMedidas("Galpon"), medidas: '', selected: false },
    { label: "Garage", variableName: "Ambientes_Garage", isMedidas: isMedidas("Garage"), medidas: '', selected: false },
    { label: "Hall", variableName: "Ambientes_Hall", isMedidas: isMedidas("Hall"), medidas: '', selected: false },
    { label: "Jardín", variableName: "Ambientes_Jardin", isMedidas: isMedidas("Jardin"), medidas: '', selected: false },
    { label: "Lavadero", variableName: "Ambientes_Lavadero", isMedidas: isMedidas("Lavadero"), medidas: '', selected: false },
    { label: "Living", variableName: "Ambientes_Living", isMedidas: isMedidas("Living"), medidas: '', selected: false },
    { label: "Living Comedor", variableName: "Ambientes_LivingComedor", isMedidas: isMedidas("LivingComedor"), medidas: '', selected: false },
    { label: "Local", variableName: "Ambientes_Local", isMedidas: isMedidas("Local"), medidas: '', selected: false },
    { label: "Oficina", variableName: "Ambientes_Oficina", isMedidas: isMedidas("Oficina"), medidas: '', selected: false },
    { label: "Palier", variableName: "Ambientes_Palier", isMedidas: isMedidas("Palier"), medidas: '', selected: false },
    { label: "Patio", variableName: "Ambientes_Patio", isMedidas: isMedidas("Patio"), medidas: '', selected: false },
    { label: "Playroom", variableName: "Ambientes_Playroom", isMedidas: isMedidas("Playroom"), medidas: '', selected: false },
    { label: "Quincho", variableName: "Ambientes_Quincho", isMedidas: isMedidas("Quincho"), medidas: '', selected: false },
    { label: "Sala", variableName: "Ambientes_Sala", isMedidas: isMedidas("Sala"), medidas: '', selected: false },
    { label: "Sótano", variableName: "Ambientes_Sotano", isMedidas: isMedidas("Sotano"), medidas: '', selected: false },
    { label: "Suite", variableName: "Ambientes_Suite", isMedidas: isMedidas("Suite"), medidas: '', selected: false },
    { label: "Terraza", variableName: "Ambientes_Terraza", isMedidas: isMedidas("Terraza"), medidas: '', selected: false },
    { label: "Toilette", variableName: "Ambientes_Toilette", isMedidas: isMedidas("Toilette"), medidas: '', selected: false },
    { label: "Vestíbulo", variableName: "Ambientes_Vestibulo", isMedidas: isMedidas("Vestibulo"), medidas: '', selected: false },
    { label: "Vestidor", variableName: "Ambientes_Vestidor", isMedidas: isMedidas("Vestidor"), medidas: '', selected: false },
    { label: "Vestuario", variableName: "Ambientes_Vestuario", isMedidas: isMedidas("Vestuario"), medidas: '', selected: false },
]


export const arrayInstalacionesCasa = [
    { label: "Agua Cloaca", variableName: "Instalaciones_AguaCloaca", selected: false },
    { label: "Agua Corriente", variableName: "Instalaciones_AguaCorriente", selected: false },
    { label: "Aire Acondicionado Central", variableName: "Instalaciones_AireAcondicionadoCentral", selected: false },
    { label: "Aire Acondicionado Individual", variableName: "Instalaciones_AireAcondicionadoIndividual", selected: false },
    { label: "Aire Caliente", variableName: "Instalaciones_AireCaliente", selected: false },
    { label: "Amoblado", variableName: "Instalaciones_Amoblado", selected: false },
    { label: "Artefactos De Cocina", variableName: "Instalaciones_ArtefactosDeCocina", selected: false },
    { label: "Ascensor", variableName: "Instalaciones_Ascensor", selected: false },
    { label: "Cable", variableName: "Instalaciones_Cable", selected: false },
    { label: "Caja Fuerte", variableName: "Instalaciones_CajaFuerte", selected: false },
    { label: "Caldera", variableName: "Instalaciones_Caldera", selected: false },
    { label: "Calefacción", variableName: "Instalaciones_Calefaccion", selected: false },
    { label: "Cancha Futbol", variableName: "Instalaciones_CanchaFutbol", selected: false },
    { label: "Cancha Tenis", variableName: "Instalaciones_CanchaTenis", selected: false },
    { label: "Desayunador", variableName: "Instalaciones_Desayunador", selected: false },
    { label: "Electricidad", variableName: "Instalaciones_Electricidad", selected: false },
    { label: "Espacio Para Vehículo", variableName: "Instalaciones_EspacioParaVehiculo", selected: false },
    { label: "Extractor De Aire", variableName: "Instalaciones_ExtractorDeAire", selected: false },
    { label: "Gas Envasado", variableName: "Instalaciones_GasEnvasado", selected: false },
    { label: "Gas Natural", variableName: "Instalaciones_GasNatural", selected: false },
    { label: "Hidromasaje", variableName: "Instalaciones_Hidromasaje", selected: false },
    { label: "Hogar A Leña", variableName: "Instalaciones_HogarALena", selected: false },
    { label: "Losa Radiante", variableName: "Instalaciones_LosaRadiante", selected: false },
    { label: "Movilidad Reducida", variableName: "Instalaciones_MovilidadReducida", selected: false },
    { label: "Muebles De Cocina", variableName: "Instalaciones_MueblesDeCocina", selected: false },
    { label: "Pavimento", variableName: "Instalaciones_Pavimento", selected: false },
    { label: "Pileta", variableName: "Instalaciones_Pileta", selected: false },
    { label: "Radiadores", variableName: "Instalaciones_Radiadores", selected: false },
    { label: "Termotanque", variableName: "Instalaciones_Termotanque", selected: false },
];


export const arrayServiciosCasa = [
    { label: "ABL", variableName: "Servicios_ABL", selected: false },
    { label: "Agua Corriente", variableName: "Servicios_AguaCorriente", selected: false },
    { label: "Calefaccion", variableName: "Servicios_Calefaccion", selected: false },
    { label: "Conmutador", variableName: "Servicios_Conmutador", selected: false },
    { label: "Electricidad", variableName: "Servicios_Electricidad", selected: false },
    { label: "Gas Envasado", variableName: "Servicios_GasEnvasado", selected: false },
    { label: "Gas Natural", variableName: "Servicios_GasNatural", selected: false },
    { label: "Internet", variableName: "Servicios_Internet", selected: false },
    { label: "Limpieza", variableName: "Servicios_Limpieza", selected: false },
    { label: "Refrigeración", variableName: "Servicios_Refrigeracion", selected: false },
    { label: "Rentas", variableName: "Servicios_Rentas", selected: false },
    { label: "Ropa Cama", variableName: "Servicios_RopaCama", selected: false },
    { label: "Seguridad", variableName: "Servicios_Seguridad", selected: false },
    { label: "Teléfono", variableName: "Servicios_Telefono", selected: false },
    { label: "Toallas", variableName: "Servicios_Toallas", selected: false },
    { label: "Videocable", variableName: "Servicios_Videocable", selected: false },
    { label: "Vigilancia", variableName: "Servicios_Vigilancia", selected: false },
];
