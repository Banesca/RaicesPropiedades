export interface IFichasRs {
  msj: string;
  fichas: IFichas[];
}

export interface IFichas {
  idFichas: number;
  ubicacion: string;
  caracteristica: string;
  valor: string;
  comision: string;
  img1fa: string,
  img2pr: string,
  img3pl: string,
  img4pl: string,
  img5sa: string,
  img6sa: string,
  fk_idPropiedad: number;
}

export class Fichas {
  static empy() {
    return {
      idFichas: null,
      ubicacion: '',
      caracteristica: '',
      valor: '',
      comision: '',
      img1fa: '',
      img2pr: '',
      img3pl: '',
      img4pl: '',
      img5sa: '',
      img6sa: '',
      fk_idPropiedad: null
    } as IFichas;
  }
}
