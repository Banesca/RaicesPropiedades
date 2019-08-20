import { arrayAmbientesDepartamento, arrayInstalacionesDepartamento, caracteristicasDepartamento, arrayServiciosDepartamento, arrayEdificioServiciosDepartamento } from "./datosporTipoPropiedad/departamento.propiedad";
import { VistaPublicaciones } from "src/app/servicios/publicaciones/publicaciones.interface";
import { caracteristicasDepartamentoTipoCasa, arrayAmbientesDepartamentoTipoCasa, arrayInstalacionesDepartamentoTipoCasa, arrayServiciosDepartamentoTipoCasa } from "./datosporTipoPropiedad/departamentoTipoCasa.propiedad";
import { caracteristicasCasa, arrayAmbientesCasa, arrayInstalacionesCasa, arrayServiciosCasa } from "./datosporTipoPropiedad/casa.propiedad";
import { caracteristicasQuinta, arrayAmbientesQuinta, arrayInstalacionesQuinta, arrayServiciosQuinta } from "./datosporTipoPropiedad/quinta.propiedad";
import { caracteristicasCochera } from "./datosporTipoPropiedad/cochera.propiedad";
import { caracteristicasLocal, arrayAmbientesLocal, arrayInstalacionesLocal, arrayServiciosLocal } from "./datosporTipoPropiedad/local.propiedad";
import { caracteristicasHotel, arrayAmbientesHotel, arrayInstalacionesHotel, arrayServiciosHotel } from "./datosporTipoPropiedad/hotel.propiedad";
import { caracteristicasTerreno, arrayInstalacionesTerreno, arrayServiciosTerreno } from "./datosporTipoPropiedad/terreno.propiedad";
import { caracteristicasOficina, arrayAmbientesOficina, arrayInstalacionesOficina, arrayServiciosOficina } from "./datosporTipoPropiedad/oficina.propiedad";
import { caracteristicasCampo, arrayInstalacionesCampo, arrayServiciosCampo } from "./datosporTipoPropiedad/campo.propiedad";
import { caracteristicasFondoComercio, arrayAmbientesFondoComercio, arrayServiciosFondoComercio } from "./datosporTipoPropiedad/fondoComercio.propiedad";
import { caracteristicasGalpon, arrayInstalacionesGalpon, arrayServiciosGalpon } from "./datosporTipoPropiedad/galpon.propiedad";
import { caracteristicasNegocioEspecial } from "./datosporTipoPropiedad/negocioEspecial.propiedad";


const dataDepartamento: VistaPublicaciones = {
    caracteristicas: caracteristicasDepartamento,
    ambientes: arrayAmbientesDepartamento,
    instalaciones: arrayInstalacionesDepartamento,
    servicios: arrayServiciosDepartamento,
    edificio: {
        caracteristicas: null,
        servicios: arrayEdificioServiciosDepartamento,
        instalaciones: null
    }
}

const dataDepartamentoTipoCasa: VistaPublicaciones = {
    caracteristicas: caracteristicasDepartamentoTipoCasa,
    ambientes: arrayAmbientesDepartamentoTipoCasa,
    instalaciones: arrayInstalacionesDepartamentoTipoCasa,
    servicios: arrayServiciosDepartamentoTipoCasa,
    edificio: null
}

const dataCasa: VistaPublicaciones = {
    caracteristicas: caracteristicasCasa,
    ambientes: arrayAmbientesCasa,
    instalaciones: arrayInstalacionesCasa,
    servicios: arrayServiciosCasa,
    edificio: null
}

const dataQuinta: VistaPublicaciones = {
    caracteristicas: caracteristicasQuinta,
    ambientes: arrayAmbientesQuinta,
    instalaciones: arrayInstalacionesQuinta,
    servicios: arrayServiciosQuinta,
    edificio: null
}

const dataCochera: VistaPublicaciones = {
    caracteristicas: caracteristicasCochera,
    ambientes: null,
    instalaciones: null,
    servicios: null,
    edificio: null
}

const dataLocal: VistaPublicaciones = {
    caracteristicas: caracteristicasLocal,
    ambientes: arrayAmbientesLocal,
    instalaciones: arrayInstalacionesLocal,
    servicios: arrayServiciosLocal,
    edificio: null
}

const dataHotel: VistaPublicaciones = {
    caracteristicas: caracteristicasHotel,
    ambientes: arrayAmbientesHotel,
    instalaciones: arrayInstalacionesHotel,
    servicios: arrayServiciosHotel,
    edificio: null
}

const dataTerreno: VistaPublicaciones = {
    caracteristicas: caracteristicasTerreno,
    ambientes: null,
    instalaciones: arrayInstalacionesTerreno,
    servicios: arrayServiciosTerreno,
    edificio: null
}

const dataOficina: VistaPublicaciones = {
    caracteristicas: caracteristicasOficina,
    ambientes: arrayAmbientesOficina,
    instalaciones: arrayInstalacionesOficina,
    servicios: arrayServiciosOficina,
    edificio: null
}

const dataCampo: VistaPublicaciones = {
    caracteristicas: caracteristicasCampo,
    ambientes: null,
    instalaciones: arrayInstalacionesCampo,
    servicios: arrayServiciosCampo,
    edificio: null
}

const dataFondoComercio: VistaPublicaciones = {
    caracteristicas: caracteristicasFondoComercio,
    ambientes: arrayAmbientesFondoComercio,
    instalaciones: null,
    servicios: arrayServiciosFondoComercio,
    edificio: null
}

const dataGalpon: VistaPublicaciones = {
    caracteristicas: caracteristicasGalpon,
    ambientes: null,
    instalaciones: arrayInstalacionesGalpon,
    servicios: arrayServiciosGalpon,
    edificio: null
}

const dataNegocioEspecial: VistaPublicaciones = {
    caracteristicas: caracteristicasNegocioEspecial,
    ambientes: null,
    instalaciones: null,
    servicios: null,
    edificio: null
}

export const DataByTipoPropiedad = {
    Departamento: dataDepartamento,
    DepartamentoTipoCasa: dataDepartamentoTipoCasa,
    Casa: dataCasa,
    Quinta: dataQuinta,
    Cochera: dataCochera,
    Local: dataLocal,
    Hotel: dataHotel,
    Terreno: dataTerreno,
    Oficina: dataOficina,
    Campo: dataCampo,
    FondoComercio: dataFondoComercio,
    Galpon: dataGalpon,
    NegocioEspecial: dataNegocioEspecial
}

/* Estos son los datos globales o generales de cada array... Los datos de cada tipo de propiedad en especifico estaran en un archivo con
    el nombre del tipo de propiedad

export const arrayAmbientesGlobal = [
    { label: "Altillo", variableName: "Ambientes_Altillo", isMedidas: isMedidas("Altillo"), medidas: '', selected: false },
    { label: "Antecocina", variableName: "Ambientes_AnteCocina", isMedidas: isMedidas("Antecocina"), medidas: '', selected: false },
    { label: "Antesala", variableName: "Ambientes_Antesala", isMedidas: isMedidas("Antesala"), medidas: '', selected: false },
    { label: "Archivo", variableName: "Ambientes_Archivo", isMedidas: isMedidas("Archivo"), medidas: '', selected: false },
    { label: "Azotea", variableName: "Ambientes_Azotea", isMedidas: isMedidas("Azotea"), medidas: '', selected: false },
    { label: "Balcón", variableName: "Ambientes_Balcon", isMedidas: isMedidas("Balcon"), medidas: '', selected: false },
    { label: "Baño", variableName: "Ambientes_Bano", isMedidas: isMedidas("Bano"), medidas: '', selected: false },
    { label: "Bar", variableName: "Ambientes_Bar", isMedidas: isMedidas("Bar"), medidas: '', selected: false },
    { label: "Baulera", variableName: "Ambientes_Baulera", isMedidas: isMedidas("Baulera"), medidas: '', selected: false },
    { label: "Biblioteca", variableName: "Ambientes_Biblioteca", isMedidas: isMedidas("Biblioteca"), medidas: '', selected: false },
    { label: "Bodega", variableName: "Ambientes_Bodega", isMedidas: isMedidas("Bodega"), medidas: '', selected: false },
    { label: "Circulación", variableName: "Ambientes_Circulacion", isMedidas: isMedidas("Circulacion"), medidas: '', selected: false },
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
    { label: "Depósito", variableName: "Ambientes_Deposito", isMedidas: isMedidas("Deposito"), medidas: '', selected: false },
    { label: "Dormitorio", variableName: "Ambientes_Dormitorio", isMedidas: isMedidas("Dormitorio"), medidas: '', selected: false },
    { label: "Entrepiso", variableName: "Ambientes_Entrepiso", isMedidas: isMedidas("Entrepiso"), medidas: '', selected: false },
    { label: "Escritorio", variableName: "Ambientes_Escritorio", isMedidas: isMedidas("Escritorio"), medidas: '', selected: false },
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
    { label: "Recepción", variableName: "Ambientes_Recepcion", isMedidas: isMedidas("Recepcion"), medidas: '', selected: false },
    { label: "Sala", variableName: "Ambientes_Sala", isMedidas: isMedidas("Sala"), medidas: '', selected: false },
    { label: "Sótano", variableName: "Ambientes_Sotano", isMedidas: isMedidas("Sotano"), medidas: '', selected: false },
    { label: "Suite", variableName: "Ambientes_Suite", isMedidas: isMedidas("Suite"), medidas: '', selected: false },
    { label: "Terraza", variableName: "Ambientes_Terraza", isMedidas: isMedidas("Terraza"), medidas: '', selected: false },
    { label: "Toilette", variableName: "Ambientes_Toilette", isMedidas: isMedidas("Toilette"), medidas: '', selected: false },
    { label: "Vestíbulo", variableName: "Ambientes_Vestibulo", isMedidas: isMedidas("Vestibulo"), medidas: '', selected: false },
    { label: "Vestidor", variableName: "Ambientes_Vestidor", isMedidas: isMedidas("Vestidor"), medidas: '', selected: false },
    { label: "Vestuario", variableName: "Ambientes_Vestuario", isMedidas: isMedidas("Vestuario"), medidas: '', selected: false },
]


export const arrayInstalacionesGlobal = [

    { label: "Agua Caliente", variableName: "Instalaciones_AguaCaliente", selected: false },
    { label: "Agua Caliente Central", variableName: "Instalaciones_AguaCalienteCentral", selected: false },
    { label: "Agua Cloaca", variableName: "Instalaciones_AguaCloaca", selected: false },
    { label: "Agua Corriente", variableName: "Instalaciones_AguaCorriente", selected: false },
    { label: "Aguadas", variableName: "Instalaciones_Aguadas", selected: false },
    { label: "Agua Pozo", variableName: "Instalaciones_AguaPozo", selected: false },
    { label: "Aire Acondicionado Central", variableName: "Instalaciones_AireAcondicionadoCentral", selected: false },
    { label: "Aire Acondicionado Individual", variableName: "Instalaciones_AireAcondicionadoIndividual", selected: false },
    { label: "Aire Caliente", variableName: "Instalaciones_AireCaliente", selected: false },
    { label: "Alambrado Perimetral", variableName: "Instalaciones_AlambradoPerimetral", selected: false },
    { label: "Alambrados", variableName: "Instalaciones_Alambrados", selected: false },
    { label: "Amoblado", variableName: "Instalaciones_Amoblado", selected: false },
    { label: "Arboleda", variableName: "Instalaciones_Arboleda", selected: false },
    { label: "Artefactos De Cocina", variableName: "Instalaciones_ArtefactosDeCocina", selected: false },
    { label: "Ascensor", variableName: "Instalaciones_Ascensor", selected: false },
    { label: "Ascensores De Servicio", variableName: "Instalaciones_AscensoresDeServicio", selected: false },
    { label: "Ascensores Principales", variableName: "Instalaciones_AscensoresPrincipales", selected: false },
    { label: "Balanza", variableName: "Instalaciones_Balanza", selected: false },
    { label: "Bebedero", variableName: "Instalaciones_Bebedero", selected: false },
    { label: "Bombeador", variableName: "Instalaciones_Bombeador", selected: false },
    { label: "Boxes", variableName: "Instalaciones_Boxes", selected: false },
    { label: "Bretes", variableName: "Instalaciones_Bretes", selected: false },
    { label: "Cable", variableName: "Instalaciones_Cable", selected: false },
    { label: "Caja Fuerte", variableName: "Instalaciones_CajaFuerte", selected: false },
    { label: "Caldera", variableName: "Instalaciones_Caldera", selected: false },
    { label: "Calefacción", variableName: "Instalaciones_Calefaccion", selected: false },
    { label: "Cancha De Basquet", variableName: "Instalaciones_CanchaDeBasquet", selected: false },
    { label: "Cancha De Futbol", variableName: "Instalaciones_CanchaDeFutbol", selected: false },
    { label: "Cancha De Hockey", variableName: "Instalaciones_CanchaDeHockey", selected: false },
    { label: "Cancha De Paddle", variableName: "Instalaciones_CanchaDePaddle", selected: false },
    { label: "Cancha De Paleta", variableName: "Instalaciones_CanchaDePaleta", selected: false },
    { label: "Cancha De Squash", variableName: "Instalaciones_CanchaDeSquash", selected: false },
    { label: "Cancha De Tenis", variableName: "Instalaciones_CanchaDeTenis", selected: false },
    { label: "Cancha De Voley", variableName: "Instalaciones_CanchaDeVoley", selected: false },
    { label: "Cancha Futbol", variableName: "Instalaciones_CanchaFutbol", selected: false },
    { label: "Cancha Tenis", variableName: "Instalaciones_CanchaTenis", selected: false },
    { label: "Corral", variableName: "Instalaciones_Corral", selected: false },
    { label: "Desayunador", variableName: "Instalaciones_Desayunador", selected: false },
    { label: "Electricidad", variableName: "Instalaciones_Electricidad", selected: false },
    { label: "Espacio Para Vehículo", variableName: "Instalaciones_EspacioParaVehiculo", selected: false },
    { label: "Estacada", variableName: "Instalaciones_Estacada", selected: false },
    { label: "Extractor De Aire", variableName: "Instalaciones_ExtractorDeAire", selected: false },
    { label: "Forestación", variableName: "Instalaciones_Forestacion", selected: false },
    { label: "Fosas", variableName: "Instalaciones_Fosas", selected: false },
    { label: "Fuerza Motriz", variableName: "Instalaciones_FuerzaMotriz", selected: false },
    { label: "Gas Envasado", variableName: "Instalaciones_GasEnvasado", selected: false },
    { label: "Gas Industrial", variableName: "Instalaciones_GasIndustrial", selected: false },
    { label: "Gas Natural", variableName: "Instalaciones_GasNatural", selected: false },
    { label: "Gimnasio", variableName: "Instalaciones_Gimnasio", selected: false },
    { label: "Grua", variableName: "Instalaciones_Grua", selected: false },
    { label: "Grupo Electrógeno", variableName: "Instalaciones_GrupoElectrogeno", selected: false },
    { label: "Haras", variableName: "Instalaciones_Haras", selected: false },
    { label: "Hidromasaje", variableName: "Instalaciones_Hidromasaje", selected: false },
    { label: "Hogar A Leña", variableName: "Instalaciones_HogarALena", selected: false },
    { label: "Instalación Parrilla", variableName: "Instalaciones_InstalacionParrilla", selected: false },
    { label: "Juegos Para Chicos", variableName: "Instalaciones_JuegosParaChicos", selected: false },
    { label: "Laundry", variableName: "Instalaciones_Laundry", selected: false },
    { label: "Losa Radiante", variableName: "Instalaciones_LosaRadiante", selected: false },
    { label: "Luz Eléctrica", variableName: "Instalaciones_LuzElectrica", selected: false },
    { label: "Mangas", variableName: "Instalaciones_Mangas", selected: false },
    { label: "Molino", variableName: "Instalaciones_Molino", selected: false },
    { label: "Montacarga", variableName: "Instalaciones_Montacarga", selected: false },
    { label: "Motores", variableName: "Instalaciones_Motores", selected: false },
    { label: "Movilidad Reducida", variableName: "Instalaciones_MovilidadReducida", selected: false },
    { label: "Muebles De Cocina", variableName: "Instalaciones_MueblesDeCocina", selected: false },
    { label: "Pavimento", variableName: "Instalaciones_Pavimento", selected: false },
    { label: "Pileta", variableName: "Instalaciones_Pileta", selected: false },
    { label: "Portón", variableName: "Instalaciones_Porton", selected: false },
    { label: "Potrero", variableName: "Instalaciones_Potrero", selected: false },
    { label: "Radiadores", variableName: "Instalaciones_Radiadores", selected: false },
    { label: "Salón De Fiestas", variableName: "Instalaciones_SalonDeFiestas", selected: false },
    { label: "Sauna", variableName: "Instalaciones_Sauna", selected: false },
    { label: "Solarium", variableName: "Instalaciones_Solarium", selected: false },
    { label: "Tambo", variableName: "Instalaciones_Tambo", selected: false },
    { label: "Tanque De Agua", variableName: "Instalaciones_TanqueDeAgua", selected: false },
    { label: "Tanque De Incendio", variableName: "Instalaciones_TanqueDeIncendio", selected: false },
    { label: "Teléfono", variableName: "Instalaciones_Telefono", selected: false },
    { label: "Termotanque", variableName: "Instalaciones_Termotanque", selected: false },
    { label: "Tratamiento Efluentes", variableName: "Instalaciones_TratamientoEfluentes", selected: false },
    { label: "Vivienda", variableName: "Instalaciones_Vivienda", selected: false },
];

export const arrayServiciosGlobal = [
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
    { label: "Limpieza", variableName: "Servicios_Limpieza", selected: false },
    { label: "Refrigeración", variableName: "Servicios_Refrigeracion", selected: false },
    { label: "Rentas", variableName: "Servicios_Rentas", selected: false },
    { label: "Ropa Cama", variableName: "Servicios_RopaCama", selected: false },
    { label: "Seguridad", variableName: "Servicios_Seguridad", selected: false },
    { label: "Teléfono", variableName: "Servicios_Telefono", selected: false },
    { label: "Toallas", variableName: "Servicios_Toallas", selected: false },
    { label: "Videocable", variableName: "Servicios_Videocable", selected: false },
    { label: "Vigilancia", variableName: "Servicios_Vigilancia", selected: false },
]

export const arrayEdificioServiciosGlobal = [
    { label: "ABL", variableName: "Edificio_Servicios_ABL", selected: false },
    { label: "Agua Corriente", variableName: "Edificio_Servicios_AguaCorriente", selected: false },
    { label: "Bar", variableName: "Edificio_Servicios_Bar", selected: false },
    { label: "Calefacción", variableName: "Edificio_Servicios_Calefaccion", selected: false },
    { label: "Cocina", variableName: "Edificio_Servicios_Cocina", selected: false },
    { label: "Conmutador", variableName: "Edificio_Servicios_Conmutador", selected: false },
    { label: "Electricidad", variableName: "Edificio_Servicios_Electricidad", selected: false },
    { label: "Gas Envasado", variableName: "Edificio_Servicios_GasEnvasado", selected: false },
    { label: "Gas Natural", variableName: "Edificio_Servicios_GasNatural", selected: false },
    { label: "Internet", variableName: "Edificio_Servicios_Internet", selected: false },
    { label: "Lavandería", variableName: "Edificio_Servicios_Lavanderia", selected: false },
    { label: "Refrigeración", variableName: "Edificio_Servicios_Refrigeracion", selected: false },
    { label: "Rentas", variableName: "Edificio_Servicios_Rentas", selected: false },
    { label: "Seguridad", variableName: "Edificio_Servicios_Seguridad", selected: false },
    { label: "Teléfono", variableName: "Edificio_Servicios_Telefono", selected: false },
    { label: "Videocable", variableName: "Edificio_Servicios_Videocable", selected: false },
    { label: "Vigilancia", variableName: "Edificio_Servicios_Vigilancia", selected: false },
]
*/
