export interface IGaleriaRs {
  msj: string;
  data: IGaleria[];
}

export interface IGaleria {
  idGaleria: number;
  titulo: string;
  descripcion: string;
  fk_publicaciones: string;
  imagenes: any;
  orden: number;
}

export class Galeria {
  static empy() {
    return {
      idGaleria: null,
      titulo: "",
      descripcion: "",
      fk_publicaciones: "",
      imagenes: null,
      orden: null
    } as IGaleria;
  }
}
