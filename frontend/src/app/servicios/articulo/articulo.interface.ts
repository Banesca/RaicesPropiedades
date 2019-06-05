export interface IArticuloRs {
    count: number;
    result: IArticulo[];
  }

export interface IArticulo {
    id?: string;
    nombre: string;
    titulo: string;
    body: string;
    imagen: string;
    descripcion: string;
    categoria?: string;
    estado: string;
    created_at:string;
}



export class CArticulo {
    static empy() {
        return {
            id: '',
            nombre: '',
            titulo: '',
            body: '',
            imagen:'',
            descripcion: '',
            cateogira:"",
            estado: '',
            created_at:''
        } as IArticulo
    }
}
