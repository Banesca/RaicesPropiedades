export const caracteristicasTerreno = {
    SuperficieTotal: true,
    SuperficieConstruible: true,
    PropiedadOcupada: true,
    Demolicion: true,
    FondoIrregular:true,
    FrenteIrregular: true,
    LateralDerechoIrregular: true,
    LateralIzquierdoIrregular: true,
    MedidaLinealDerecha: true,
    MedidaLinealIzquierda: true,
    LongitudFrente: true,
    LongitudFondo: true,
    fk_TipoCosta: true,
    fk_TipoPendiente: true,
    fk_TipoVista: true,
    FOT: true,
    Zonificacion:true,
    Generales_SeguroCaucion: true,
}

export const arrayInstalacionesTerreno = [

    { label: "Agua Cloaca", variableName: "Instalaciones_AguaCloaca", selected: false },
    { label: "Agua Corriente", variableName: "Instalaciones_AguaCorriente", selected: false },
    { label: "Agua Pozo", variableName: "Instalaciones_AguaPozo", selected: false },
    { label: "Alambrados", variableName: "Instalaciones_Alambrados", selected: false },
    { label: "Arboleda", variableName: "Instalaciones_Arboleda", selected: false },
    { label: "Bebedero", variableName: "Instalaciones_Bebedero", selected: false },
    { label: "Bretes", variableName: "Instalaciones_Bretes", selected: false },
    { label: "Corral", variableName: "Instalaciones_Corral", selected: false },
    { label: "Electricidad", variableName: "Instalaciones_Electricidad", selected: false },
    { label: "Estacada", variableName: "Instalaciones_Estacada", selected: false },
    { label: "Forestación", variableName: "Instalaciones_Forestacion", selected: false },
    { label: "Fosas", variableName: "Instalaciones_Fosas", selected: false },
    { label: "Haras", variableName: "Instalaciones_Haras", selected: false },
    { label: "Luz Eléctrica", variableName: "Instalaciones_LuzElectrica", selected: false },
    { label: "Mangas", variableName: "Instalaciones_Mangas", selected: false },
    { label: "Molino", variableName: "Instalaciones_Molino", selected: false },
    { label: "Pavimento", variableName: "Instalaciones_Pavimento", selected: false },
    { label: "Potrero", variableName: "Instalaciones_Potrero", selected: false },
    { label: "Piso Radiante Individual", variableName: "piso_Radiante_Individual", selected: false },
    { label: "Piso Radiante Central", variableName: "piso_Radiante_Central", selected: false },
    { label: "Hidromasaje", variableName: "hidromasaje", selected: false },
    { label: "Radiadores", variableName: "Instalaciones_Radiadores", selected: false },
    { label: "Calefón", variableName: "calefon", selected: false },
    { label: "Tambo", variableName: "Instalaciones_Tambo", selected: false },
    { label: "Vivienda", variableName: "Instalaciones_Vivienda", selected: false },

];

export const arrayServiciosTerreno = [
    //Servicios
    { label: "ABL", variableName: "Servicios_ABL", selected: false },
    { label: "Agua Corriente", variableName: "Servicios_AguaCorriente", selected: false },
    { label: "Electricidad", variableName: "Servicios_Electricidad", selected: false },
    { label: "Gas Envasado", variableName: "Servicios_GasEnvasado", selected: false },
    { label: "Gas Natural", variableName: "Servicios_GasNatural", selected: false },
    { label: "Rentas", variableName: "Servicios_Rentas", selected: false },
    { label: "Teléfono", variableName: "Servicios_Telefono", selected: false },
]
