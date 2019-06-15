export interface ITransaccionesRs {
    msj: string;
    data: ITransacciones[];
  }
  
  export interface ITransacciones {
    idTransacciones: number;
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
        idTransacciones: null,
        contacto: '',
        telefono: '',
        categoria: '',
        titulo: '',
        descripcion: '',
        fotos: '',
      } as ITransacciones;
    }
  }
  