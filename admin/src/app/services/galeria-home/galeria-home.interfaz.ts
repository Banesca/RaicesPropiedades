 export interface IGaleriaRs {
    msj: string;
    galerias: IGaleria[];
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
  