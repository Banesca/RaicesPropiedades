export interface IContacto {
    id?: string;
    nombres?: string;
    apellidos?: string;
    email?: string;
    tema: string;
    mensaje: string;
    created_at:string;
}


export class CContacto{
    static empy() {
        return {
            id: '',
            nombres: '',
            apellidos: '',
            email: '',
            tema: '',
            mensaje:'',
            created_at:''
        } as IContacto
    }
}
