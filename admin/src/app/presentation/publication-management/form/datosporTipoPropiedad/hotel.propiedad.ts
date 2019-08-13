import { isMedidas } from "../datosPorTipoPropiedad";


export const caracteristicasHotel = {
    SuperficieTerreno: true,
    SuperficieCubierta: true,
    SuperficieDescubierta: true,
    SuperficiePlaya: true,
    SuperficieDeposito: true,
    Antiguedad: true,
    CantidadPisos: true,
    HabitacionesPorPiso: true,
    CantidadPersonal: true,
    RentabilidadAnual: true,
    CantidadHabitaciones: true,
    CantidadEstrellas: true,
    PropiedadOcupada: true,
    CantidadPlazas: true,
    CantidadCubiertos: true,
    fk_TipoVista: true,
    fk_TipoCosta: true,
    fk_TipoPendiente: true,
}


export const arrayAmbientesHotel = [
    { label: "Balcón", variableName: "Ambientes_Balcon", isMedidas: isMedidas("Balcon"), medidas: '', selected: false },
    { label: "Bar", variableName: "Ambientes_Bar", isMedidas: isMedidas("Bar"), medidas: '', selected: false },
    { label: "Biblioteca", variableName: "Ambientes_Biblioteca", isMedidas: isMedidas("Biblioteca"), medidas: '', selected: false },
    { label: "Cochera", variableName: "Ambientes_Cochera", isMedidas: isMedidas("Cochera"), medidas: '', selected: false },
    { label: "Depósito", variableName: "Ambientes_Deposito", isMedidas: isMedidas("Deposito"), medidas: '', selected: false },
    { label: "Garage", variableName: "Ambientes_Garage", isMedidas: isMedidas("Garage"), medidas: '', selected: false },
    { label: "Jardín", variableName: "Ambientes_Jardin", isMedidas: isMedidas("Jardin"), medidas: '', selected: false },
    { label: "Lavadero", variableName: "Ambientes_Lavadero", isMedidas: isMedidas("Lavadero"), medidas: '', selected: false },
    { label: "Oficina", variableName: "Ambientes_Oficina", isMedidas: isMedidas("Oficina"), medidas: '', selected: false },
    { label: "Sala", variableName: "Ambientes_Sala", isMedidas: isMedidas("Sala"), medidas: '', selected: false },
    { label: "Sótano", variableName: "Ambientes_Sotano", isMedidas: isMedidas("Sotano"), medidas: '', selected: false },
    { label: "Vestuario", variableName: "Ambientes_Vestuario", isMedidas: isMedidas("Vestuario"), medidas: '', selected: false },
]


export const arrayInstalacionesHotel = [
    { label: "Agua Caliente", variableName: "Instalaciones_AguaCaliente", selected: false },
    { label: "Agua Corriente", variableName: "Instalaciones_AguaCorriente", selected: false },
    { label: "Aire Acondicionado Central", variableName: "Instalaciones_AireAcondicionadoCentral", selected: false },
    { label: "Aire Acondicionado Individual", variableName: "Instalaciones_AireAcondicionadoIndividual", selected: false },
    { label: "Ascensor", variableName: "Instalaciones_Ascensor", selected: false },
    { label: "Gimnasio", variableName: "Instalaciones_Gimnasio", selected: false },
    { label: "Grupo Electrógeno", variableName: "Instalaciones_GrupoElectrogeno", selected: false },
    { label: "Juegos Para Chicos", variableName: "Instalaciones_JuegosParaChicos", selected: false },
    { label: "Laundry", variableName: "Instalaciones_Laundry", selected: false },
    { label: "Pileta", variableName: "Instalaciones_Pileta", selected: false },
    { label: "Salón De Fiestas", variableName: "Instalaciones_SalonDeFiestas", selected: false },
    { label: "Sauna", variableName: "Instalaciones_Sauna", selected: false },
];


export const arrayServiciosHotel = [
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
