
export interface ICategoriaRs {
    msj: string;
    data: ICategoria[];
  }

export interface ICategoria {
    idTipoPropiedad: number;
    descripcion?: string;
}


export class CCategoria {
    static empy() {
        return {
            idTipoPropiedad: null,
            descripcion: '',
        } as ICategoria
    }
}
