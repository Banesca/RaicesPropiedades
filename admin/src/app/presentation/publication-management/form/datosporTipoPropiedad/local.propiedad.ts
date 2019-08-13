import { isMedidas } from "../datosPorTipoPropiedad";


export const caracteristicasLocal = {
    Antiguedad: true,
    CantidadBanos: true,
    CantidadCocheras: true,
    PropiedadOcupada:true,
    Vivienda:true, 
    CantidadPlantas:true,
    MontoExpensas: true,
    TerrenoPropio: true,
    Vidriera: true,
    MetrosDeLaEsquina: true,
    EnEdificio: true,
    UltimaActividad: true,
    GaleriaShopping: true,
    Generales_SeguroCaucion: true,
}


export const arrayAmbientesLocal = [
    { label: "Altillo", variableName: "Ambientes_Altillo", isMedidas: isMedidas("Altillo"), medidas: '', selected: false },
    { label: "Archivo", variableName: "Ambientes_Archivo", isMedidas: isMedidas("Archivo"), medidas: '', selected: false },
    { label: "Azotea", variableName: "Ambientes_Azotea", isMedidas: isMedidas("Azotea"), medidas: '', selected: false },
    { label: "Balcón", variableName: "Ambientes_Balcon", isMedidas: isMedidas("Balcon"), medidas: '', selected: false },
    { label: "Baño", variableName: "Ambientes_Bano", isMedidas: isMedidas("Bano"), medidas: '', selected: false },
    { label: "Bar", variableName: "Ambientes_Bar", isMedidas: isMedidas("Bar"), medidas: '', selected: false },
    { label: "Baulera", variableName: "Ambientes_Baulera", isMedidas: isMedidas("Baulera"), medidas: '', selected: false },
    { label: "Cochera", variableName: "Ambientes_Cochera", isMedidas: isMedidas("Cochera"), medidas: '', selected: false },
    { label: "Cocina", variableName: "Ambientes_Cocina", isMedidas: isMedidas("Cocina"), medidas: '', selected: false },
    { label: "Dependencia", variableName: "Ambientes_Dependencia", isMedidas: isMedidas("Dependencia"), medidas: '', selected: false },
    { label: "Dependencia De Servicio", variableName: "Ambientes_DependenciaDeServicio", isMedidas: isMedidas("DependenciaDeServicio"), medidas: '', selected: false },
    { label: "Depósito", variableName: "Ambientes_Deposito", isMedidas: isMedidas("Deposito"), medidas: '', selected: false },
    { label: "Entrepiso", variableName: "Ambientes_Entrepiso", isMedidas: isMedidas("Entrepiso"), medidas: '', selected: false },
    { label: "Galpón", variableName: "Ambientes_Galpon", isMedidas: isMedidas("Galpon"), medidas: '', selected: false },
    { label: "Garage", variableName: "Ambientes_Garage", isMedidas: isMedidas("Garage"), medidas: '', selected: false },
    { label: "Jardín", variableName: "Ambientes_Jardin", isMedidas: isMedidas("Jardin"), medidas: '', selected: false },
    { label: "Oficina", variableName: "Ambientes_Oficina", isMedidas: isMedidas("Oficina"), medidas: '', selected: false },
    { label: "Patio", variableName: "Ambientes_Patio", isMedidas: isMedidas("Patio"), medidas: '', selected: false },
    { label: "Sala", variableName: "Ambientes_Sala", isMedidas: isMedidas("Sala"), medidas: '', selected: false },
    { label: "Sótano", variableName: "Ambientes_Sotano", isMedidas: isMedidas("Sotano"), medidas: '', selected: false },
    { label: "Terraza", variableName: "Ambientes_Terraza", isMedidas: isMedidas("Terraza"), medidas: '', selected: false },
    { label: "Toilette", variableName: "Ambientes_Toilette", isMedidas: isMedidas("Toilette"), medidas: '', selected: false },
    { label: "Vestuario", variableName: "Ambientes_Vestuario", isMedidas: isMedidas("Vestuario"), medidas: '', selected: false },
]


export const arrayInstalacionesLocal = [
    { label: "Agua Caliente", variableName: "Instalaciones_AguaCaliente", selected: false },
    { label: "Agua Caliente Central", variableName: "Instalaciones_AguaCalienteCentral", selected: false },
    { label: "Agua Cloaca", variableName: "Instalaciones_AguaCloaca", selected: false },
    { label: "Agua Corriente", variableName: "Instalaciones_AguaCorriente", selected: false },
    { label: "Agua Pozo", variableName: "Instalaciones_AguaPozo", selected: false },
    { label: "Aire Acondicionado Central", variableName: "Instalaciones_AireAcondicionadoCentral", selected: false },
    { label: "Aire Acondicionado Individual", variableName: "Instalaciones_AireAcondicionadoIndividual", selected: false },
    { label: "Aire Caliente", variableName: "Instalaciones_AireCaliente", selected: false },
    { label: "Ascensores De Servicio", variableName: "Instalaciones_AscensoresDeServicio", selected: false },
    { label: "Ascensores Principales", variableName: "Instalaciones_AscensoresPrincipales", selected: false },
    { label: "Boxes", variableName: "Instalaciones_Boxes", selected: false },
    { label: "Caja Fuerte", variableName: "Instalaciones_CajaFuerte", selected: false },
    { label: "Caldera", variableName: "Instalaciones_Caldera", selected: false },
    { label: "Calefacción", variableName: "Instalaciones_Calefaccion", selected: false },
    { label: "Movilidad Reducida", variableName: "Instalaciones_MovilidadReducida", selected: false },
    { label: "Pavimento", variableName: "Instalaciones_Pavimento", selected: false },
];


export const arrayServiciosLocal = [
    { label: "ABL", variableName: "Servicios_ABL", selected: false },
    { label: "Agua Corriente", variableName: "Servicios_AguaCorriente", selected: false },
    { label: "Bar", variableName: "Servicios_Bar", selected: false },
    { label: "Conmutador", variableName: "Servicios_Conmutador", selected: false },
    { label: "Electricidad", variableName: "Servicios_Electricidad", selected: false },
    { label: "Gas Natural", variableName: "Servicios_GasNatural", selected: false },
    { label: "Internet", variableName: "Servicios_Internet", selected: false },
    { label: "Limpieza", variableName: "Servicios_Limpieza", selected: false },
    { label: "Teléfono", variableName: "Servicios_Telefono", selected: false },
    { label: "Videocable", variableName: "Servicios_Videocable", selected: false },
];
