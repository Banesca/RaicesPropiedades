export interface ITransaccionesRs {
    msj: string;
    galerias: ITransacciones[];
  }
  
  export interface ITransacciones {
    contacto: string;
    telefono: string;
    categoria: string;
    titulo: string;
    descripcion: string;
    fotos: string;
  }

  export class Transacciones {
    static empy() {
      return {
        contacto: '',
        telefono: '',
        categoria: '',
        titulo: '',
        descripcion: '',
        fotos: '',
      } as ITransacciones;
    }
  }
  