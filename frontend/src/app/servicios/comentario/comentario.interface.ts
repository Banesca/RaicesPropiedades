export interface IComentarioRs {
    count: number;
    result: IComentario[];
  }

export interface IComentario {
    id?: string;
    comentario: string;
    usuario?: string;
    estado?: string;
    articulo?: string;
    created_at: string;

}

export class CComentario {
    static empy() {
        return {
            id: '',
            comentario: '',
            usuario: '',
            estado: '',
            articulo: '',
            created_at:''
        } as IComentario
    }
}
