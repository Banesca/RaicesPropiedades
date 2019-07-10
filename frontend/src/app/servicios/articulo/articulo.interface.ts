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
            moneda: 'Seleccione'
        } as IMonedas
    }
}
export class TipoPropiedad {
    static empy() {
        return {
            idTipoPropiedad: null,
            descripcion: 'Seleccione'
        } as ITipoPropiedad
    }
}
