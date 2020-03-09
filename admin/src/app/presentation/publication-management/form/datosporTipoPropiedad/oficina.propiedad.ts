import { isMedidas } from "./funcion";


export const caracteristicasOficina = {
    Antiguedad: true,
    fk_Orientacion: true,
    CantidadBanos: true,
    fk_TipoBano: true,
    SuperficiePlanta: true,
    PropedadOcupada: true,
    MontoExpensas: true,
    Reciclado: true,
    DepartamentosPorPiso: true,
    AptoProfesional: true,
    SuperficieDeposito: true,
    SuperficieOficina: true,
    fk_TipoAscensor: true,
    fk_TipoPiso: true,
    fk_TipoBalcon: true,
    CantidadAmbientes: true,
    CantidadCocheras: true,
    Generales_SeguroCaucion: true,
}


export const arrayAmbientesOficina = [
    { label: "Altillo", variableName: "Ambientes_Altillo", isMedidas: isMedidas("Altillo"), medidas: '', selected: false },
    { label: "Antecocina", variableName: "Ambientes_AnteCocina", isMedidas: isMedidas("Antecocina"), medidas: '', selected: false },
    { label: "Archivo", variableName: "Ambientes_Archivo", isMedidas: isMedidas("Archivo"), medidas: '', selected: false },
    { label: "Azotea", variableName: "Ambientes_Azotea", isMedidas: isMedidas("Azotea"), medidas: '', selected: false },
    { label: "Baño", variableName: "Ambientes_Bano", isMedidas: isMedidas("Bano"), medidas: '', selected: false },
    { label: "Baulera", variableName: "Ambientes_Baulera", isMedidas: isMedidas("Baulera"), medidas: '', selected: false },
    { label: "Circulación", variableName: "Ambientes_Circulacion", isMedidas: isMedidas("Circulacion"), medidas: '', selected: false },
    { label: "Cochera", variableName: "Ambientes_Cochera", isMedidas: isMedidas("Cochera"), medidas: '', selected: false },
    { label: "Cocina", variableName: "Ambientes_Cocina", isMedidas: isMedidas("Cocina"), medidas: '', selected: false },
    { label: "Cuarto De Herramientas", variableName: "Ambientes_CuartoDeHerramientas", isMedidas: isMedidas("CuartoDeHerramientas"), medidas: '', selected: false },
    { label: "Depósito", variableName: "Ambientes_Deposito", isMedidas: isMedidas("Deposito"), medidas: '', selected: false },
    { label: "Entrepiso", variableName: "Ambientes_Entrepiso", isMedidas: isMedidas("Entrepiso"), medidas: '', selected: false },
    { label: "Garage", variableName: "Ambientes_Garage", isMedidas: isMedidas("Garage"), medidas: '', selected: false },
    { label: "Sala", variableName: "Ambientes_Sala", isMedidas: isMedidas("Sala"), medidas: '', selected: false },
    { label: "Terraza", variableName: "Ambientes_Terraza", isMedidas: isMedidas("Terraza"), medidas: '', selected: false },
    { label: "Toilette", variableName: "Ambientes_Toilette", isMedidas: isMedidas("Toilette"), medidas: '', selected: false },
]


export const arrayInstalacionesOficina = [

    { label: "Aire Acondicionado Central", variableName: "Instalaciones_AireAcondicionadoCentral", selected: false },
    { label: "Aire Acondicionado Individual", variableName: "Instalaciones_AireAcondicionadoIndividual", selected: false },
    { label: "Aire Caliente", variableName: "Instalaciones_AireCaliente", selected: false },
    { label: "Ascensor", variableName: "Instalaciones_Ascensor", selected: false },
    { label: "Caldera Individual", variableName: "Instalaciones_Caldera", selected: false },
    { label: "Calefacción", variableName: "Instalaciones_Calefaccion", selected: false },
    { label: "Espacio Para Vehículo", variableName: "Instalaciones_EspacioParaVehiculo", selected: false },
    { label: "Gimnasio", variableName: "Instalaciones_Gimnasio", selected: false },
    { label: "Grupo Electrógeno", variableName: "Instalaciones_GrupoElectrogeno", selected: false },
    { label: "Juegos Para Chicos", variableName: "Instalaciones_JuegosParaChicos", selected: false },
    { label: "Laundry", variableName: "Instalaciones_Laundry", selected: false },
    { label: "Losa Radiante", variableName: "Instalaciones_LosaRadiante", selected: false },
    { label: "Acceso Reducida", variableName: "Instalaciones_MovilidadReducida", selected: false },
    { label: "Pavimento", variableName: "Instalaciones_Pavimento", selected: false },
    { label: "Pileta", variableName: "Instalaciones_Pileta", selected: false },
    { label: "Piso Radiante Individual", variableName: "piso_Radiante_Individual", selected: false },
    { label: "Piso Radiante Central", variableName: "piso_Radiante_Central", selected: false },
    { label: "Hidromasaje", variableName: "hidromasaje", selected: false },
    { label: "Calefón", variableName: "calefon", selected: false },
    { label: "Radiadores", variableName: "Instalaciones_Radiadores", selected: false },
    { label: "Salón De Fiestas", variableName: "Instalaciones_SalonDeFiestas", selected: false },
    { label: "Sauna", variableName: "Instalaciones_Sauna", selected: false },
    { label: "Teléfono", variableName: "Instalaciones_Telefono", selected: false },
    { label: "Termotanque", variableName: "Instalaciones_Termotanque", selected: false },
];

export const arrayServiciosOficina = [
    //Servicios
    { label: "ABL", variableName: "Servicios_ABL", selected: false },
    { label: "Agua Corriente", variableName: "Servicios_AguaCorriente", selected: false },
    { label: "Bar", variableName: "Servicios_Bar", selected: false },
    { label: "Calefaccion", variableName: "Servicios_Calefaccion", selected: false },
    { label: "Cocina", variableName: "Servicios_Cocina", selected: false },
    { label: "Conmutador", variableName: "Servicios_Conmutador", selected: false },
    { label: "Electricidad", variableName: "Servicios_Electricidad", selected: false },
    { label: "Gas Envasado", variableName: "Servicios_GasEnvasado", selected: false },
    { label: "Gas Natural", variableName: "Servicios_GasNatural", selected: false },
    { label: "Internet", variableName: "Servicios_Internet", selected: false },
    { label: "Lavandería", variableName: "Servicios_Lavanderia", selected: false },
    { label: "Refrigeración", variableName: "Servicios_Refrigeracion", selected: false },
    { label: "Rentas", variableName: "Servicios_Rentas", selected: false },
    { label: "Seguridad", variableName: "Servicios_Seguridad", selected: false },
    { label: "Teléfono", variableName: "Servicios_Telefono", selected: false },
    { label: "Videocable", variableName: "Servicios_Videocable", selected: false },
    { label: "Vigilancia", variableName: "Servicios_Vigilancia", selected: false },
];