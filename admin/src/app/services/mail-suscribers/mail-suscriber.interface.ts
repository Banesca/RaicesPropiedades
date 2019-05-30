export interface IMailSuscriberRs {
    msj: string;
    suscripcion: IMailSuscriber[];
  }
  
  export interface IMailSuscriber {
    id: string;
    titulo: string;
    descripcion: string;
    estado?: string;
  }
  
  export class MailSuscribers {
    static empy() {
      return {
        id: '',
        titulo: '',
        descripcion: '',
        estado: ''
      } as IMailSuscriber;
    }
  }
  