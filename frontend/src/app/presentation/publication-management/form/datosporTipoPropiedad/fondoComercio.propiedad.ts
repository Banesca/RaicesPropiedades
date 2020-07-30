import { isMedidas } from "./funcion";

export const caracteristicasFondoComercio = [
        { label: "Superficie Terreno", variableName: "SuperficieTerreno",selected: false, value:""},
        { label: "Superficie Playa", variableName: "SuperficiePlaya",selected: false, value:""},
        { label: "Superficie Deposito", variableName: "SuperficieDeposito",selected: false, value:""},
        { label: "Superficie Local", variableName: "SuperficieLocal",selected: false, value:""},
        { label: "Antiguedad", variableName: "Antiguedad",selected: false, value:""},
        { label: "Referencia Cercana", variableName: "ReferenciaCercana",selected: false, value:""},
        { label: "Cantidad Baños", variableName: "CantidadBanos",selected: false, value:""},
        { label: "Vivienda", variableName: "Vivienda",selected: false, value:""},
        { label: "Expensas", variableName: "Expensas",selected: false, value:""},
        { label: "Cantidad Cocheras", variableName: "CantidadCocheras",selected: false, value:""},
        { label: "Cantidad Ambientes", variableName: "CantidadAmbientes",selected: false, value:""},
        { label: "Antiguedad Comercio", variableName: "AntiguedadComercio",selected: false, value:""},
        { label: "Recaudacion Mensual", variableName: "RecaudacionMensual",selected: false, value:""},
        { label: "Local", variableName: "Local",selected: false, value:""},
        { label: "Venta Mercaderia", variableName: "VentaMercaderia",selected: false, value:""},
        { label: "Metros de la Esquina", variableName: "MetrosDeLaEsquina",selected: false, value:""}
]

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
