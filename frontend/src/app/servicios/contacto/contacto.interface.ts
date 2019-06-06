export interface IContacto {
    nombres?: string;
    email?: string;
    telefono: string;
    mensaje: string;
}


export class CContacto{
    static empy() {
        return {
            nombres: '',
            email: '',
            telefono: '',
            mensaje:'',
        } as IContacto
    }
}
