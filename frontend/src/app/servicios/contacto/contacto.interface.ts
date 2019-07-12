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
    imagen_1: string;
    imagen_2: string;
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
            imagen_1: '',
            imagen_2: ''
        } as IContacto
    }
}
