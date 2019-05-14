export interface IImagen {
    id?: string;
    nombre: string;
    imagen: string;
}

export interface IImagenHeader {
    count: number;
    result: IImagen[];
}

export class CImagen {
    static empy() {
        return {
            id: '',
            nombre: '',
            imagen:''
        } as IImagen
    }
}
