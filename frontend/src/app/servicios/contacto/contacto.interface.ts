export interface IContactoRs {
    msj: string;
    data: IContacto[];
  }

export interface IContacto {
    nombre_apellido: string;
    email: string;
    telefono: string;
    fk_tipoPropiedad: number;
    titulo: string;
    descripcion: string;
    imagen_1: any;
    imagen_2: any;
}


export class CContacto{
    static empy() {
        return {
            nombre_apellido: '',
            email: '',
            telefono: '',
            fk_tipoPropiedad: null,
            titulo: '',
            descripcion: '',
            imagen_1: null,
            imagen_2: null
        } as IContacto
    }
}
