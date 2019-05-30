export interface IGestionPublicacionesRs {
    count: number;
    result: IGestionPublicaciones[];
  }
  
  export interface IGestionPublicaciones {
    id: string,
    titulo: string,
    descripcion: string,
    tipo: string,
    oportunidad: boolean,
    novedad: boolean,
    estado?: string
  }
  
  export class GestionPublicaciones {
    static empy() {
      return {
        id: '',
        titulo: '',
        descripcion: '',
        tipo: '',
        oportunidad: false,
        novedad: false,
        estado: ''
      } as IGestionPublicaciones;
    }
  }

