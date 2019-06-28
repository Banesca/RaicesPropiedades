export interface IUsuariosRs {
    msj: string;
    users: IUsuarios[];
  }
  
  export interface IUsuarios {
    id: number;
    name: string;
    email: string;
    password: string;
    password_confirmation: string;
  }
   
  export class Usuarios {
    static empy() {
      return {
        id: null,
        name: '',
        email: '',
        password: '',
        password_confirmation: '', 
      } as IUsuarios;
    }
  }

