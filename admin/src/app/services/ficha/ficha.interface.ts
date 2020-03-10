export interface IFichasRs {
  msj: string;
  fichas: IFichas[];
}

export interface IFichas {
  idFichas: number;
  titulo:string;
  ubicacion: string;
  caracteristica: string;
  valor: string;
  comision: string;
  img1fa: any;
  img2pr: any;
  img3pl: any;
  img4pl: any;
  img5sa: any;
  img6sa: any;
  fk_idPropiedad: number;
}

export class Fichas {
  static empy() {
    return {
      idFichas: null,
      titulo:'',
      ubicacion: '',
      caracteristica: '',
      valor: '',
      comision: '',
      img1fa: null,
      img2pr:null,
      img3pl:null,
      img4pl:null,
      img5sa:null,
      img6sa:null,
      fk_idPropiedad: null
    } as IFichas;
  }
}
