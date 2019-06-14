 export interface IGaleriaRs {
    msj: string;
    data: IGaleria[];
  }
  
  export interface IGaleria {
    titulo: string;
    descripcion: string;
  }

  export class Galeria {
    static empy() {
      return {
        titulo: '',
        descripcion: ''
      } as IGaleria;
    }
  }
  