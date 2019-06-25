export interface ITransaccionesRs {
    msj: string;
    data: ITransacciones[];
  }
  
  export interface ITransacciones {
    idTransacciones: number;
    nombre_apellido: string;
    tipo_propiedad?: {
      descripcion: string;
      idTipoPropiedad: number;
    }
    telefono: string;
    fk_tipoPropiedad: string;
    titulo: string;
    descripcion: string;
  }

  export class Transacciones {
    static empy() {
      return {
        idTransacciones: null,
        nombre_apellido: '',
        telefono: '',
        fk_tipoPropiedad: '',
        titulo: '',
        descripcion: '', 
      } as ITransacciones;
    }
  }
  