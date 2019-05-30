export interface IUsuariosRs {
    msj: number;
    users: IUsuarios[];
  }
  
  export interface IUsuarios {
    id: string,
    name: string,
    email: string,
    fk_statusUser: number,
    password?: string,
  }
  
  export class Usuarios {
    static empy() {
      return {
        id: '',
        name: '',
        email: '',
        fk_statusUser: 1,
        password: ''
      } as IUsuarios;
    }
  }

