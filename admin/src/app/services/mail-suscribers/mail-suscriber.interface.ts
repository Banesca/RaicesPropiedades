export interface IMailSuscriberRs {
    msj: string;
    suscripcion: IMailSuscriber[];
  }
  
  export interface IMailSuscriber {
    idSuscripcionUser: number;
    titulo: string;
    descripcion: string;
    estado?: string;
  }
  
  export class MailSuscribers {
    static empy() {
      return {
        idSuscripcionUser: null,
        titulo: '',
        descripcion: '',
        estado: ''
      } as IMailSuscriber;
    }
  }
  
  
  export interface ISuscriberRs {
    msj: string;
    suscripcion: ISuscriber[];
  }
  
  export interface ISuscriber {
    idSuscripcionUser: number;
    titulo: string;
    descripcion: string;
    estado?: string;
  }

  export class Suscriber {
    static empy() {
      return {
        idSuscripcionUser: null,
        titulo: '',
        descripcion: '',
        estado: ''
      } as IMailSuscriber;
    }
  }
  