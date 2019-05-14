
export interface ICategoriaRs {
    count: number;
    result: ICategoria[];
  }

export interface ICategoria {
    id?: string;
    nombre?: string;
    descripcion?: string;
    estado?: string;
    created_at: string;
}


export class CCategoria {
    static empy() {
        return {
            id: '',
            nombre: '',
            descripcion: '',
            estado: '',
            created_at: ''
        } as ICategoria
    }
}
