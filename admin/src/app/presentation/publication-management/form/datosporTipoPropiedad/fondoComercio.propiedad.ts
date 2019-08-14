import { isMedidas } from "./funcion";

export const caracteristicasFondoComercio = {
    SuperficieTerreno: true,
    SuperficiePlaya: true,
    SuperficieDeposito: true,
    SuperficieLocal: true,
    Antiguedad: true,
    ReferenciaCercana: true,
    CantidadBanos: true,
    Vivienda: true,
    Expensas: true,
    CantidadCocheras: true,
    CantidadAmbientes: true,
    AntiguedadComercio: true,
    RecaudacionMensual: true,
    Local: true,
    VentaMercaderia: true,
    MetrosDeLaEsquina: true,
}

export const arrayAmbientesFondoComercio = [
    { label: "Cocina", variableName: "Ambientes_Cocina", isMedidas: isMedidas("Cocina"), medidas: '', selected: false },
    { label: "Comedor", variableName: "Ambientes_Comedor", isMedidas: isMedidas("Comedor"), medidas: '', selected: false },
    { label: "Depósito", variableName: "Ambientes_Deposito", isMedidas: isMedidas("Deposito"), medidas: '', selected: false },
    { label: "Galpón", variableName: "Ambientes_Galpon", isMedidas: isMedidas("Galpon"), medidas: '', selected: false },
    { label: "Garage", variableName: "Ambientes_Garage", isMedidas: isMedidas("Garage"), medidas: '', selected: false },
    { label: "Oficina", variableName: "Ambientes_Oficina", isMedidas: isMedidas("Oficina"), medidas: '', selected: false },
    { label: "Vestidor", variableName: "Ambientes_Vestidor", isMedidas: isMedidas("Vestidor"), medidas: '', selected: false },
]



export const arrayServiciosFondoComercio = [
    //Servicios
    { label: "Rentas", variableName: "Servicios_Rentas", selected: false },
]
