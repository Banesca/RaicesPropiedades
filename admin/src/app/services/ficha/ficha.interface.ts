export interface IFichasRs {
  msj: string;
  fichas: IFichas[];
}

export interface IFichas {
  idFichas: number;
  titulo: string;
  ubicacion: string;
  caracteristica: string;
  valor: string;
  comision: string;
  img: any;
  fk_idPropiedad: number;
}

export class Fichas {
  static empy() {
    return {
      idFichas: null,
      titulo: '',
      ubicacion: '',
      caracteristica: '',
      valor: '',
      comision: '',
      img: null,
      fk_idPropiedad: null
    } as IFichas;
  }
}
