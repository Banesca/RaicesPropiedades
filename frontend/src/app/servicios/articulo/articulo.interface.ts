export interface IMonedas {
    idMonedas: number;
    moneda: string;
}

export interface ITipoPropiedad {
    idTipoPropiedad:  number;
    descripcion:  string;
}


export interface IOrientacion {
    idOrientacion: number;
    descripcion:  string;
}

export class Monedas {
    static empy() {
        return {
            idMonedas: null,
            moneda: 'Moneda'
        } as IMonedas
    }
}
export class TipoPropiedad {
    static empy() {
        return {
            idTipoPropiedad: null,
            descripcion: 'Tipo de inmueble'
        } as ITipoPropiedad
    }
}



export interface TipoOperaion {
    idTipoOperaion: number; 
    descripcion: string ;
} 


export class TOperaion {
    static empy() {
        return {
            idTipoOperaion: null,
            descripcion: 'Operación'
        } as TipoOperaion
    }
}