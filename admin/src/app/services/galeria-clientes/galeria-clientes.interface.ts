export interface IGaleriaCl {
  msj: string;
  banner: IGaleriaClientes[];
}

export interface IGaleriaClientes {
  idBannerCliente: number;
  fk_idUser: string;
  dir_imagen: any;
  orden: number;
  urlImagen:string;
}

export class GaleriaClientes {
  static empy() {
    return {
      idBannerCliente: null,
      fk_idUser: "",
      dir_imagen: null,
      orden: null
    } as IGaleriaClientes;
  }
}
