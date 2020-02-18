export interface IFichasRs {
  msj: string;
  fichas: IFichas[];
}

export interface IFichas {
  idFichas: number,
  ubicacion: string,
  caracteristica: string,
  valor: string,
  comision: string,
  img: Array<any>,
  fk_idPropiedad: number
}

export class Fichas {
  static empy() {
    return {
      idFichas: null,
      ubicacion: '',
      caracteristica: '',
      valor: '',
      comision: '',
      img: {},
      fk_idPropiedad: null
    } as IFichas;
  }
}