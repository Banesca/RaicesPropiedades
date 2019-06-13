export interface IContacto {
    nombre_apellido: string;
    telefono: string;
    fk_tipoPropiedad: number;
    titulo: string;
    descripcion: string;
}


export class CContacto{
    static empy() {
        return {
        nombre_apellido: '',
        telefono: '',
        fk_tipoPropiedad: null,
        titulo: '',
        descripcion: ''
        } as IContacto
    }
}
