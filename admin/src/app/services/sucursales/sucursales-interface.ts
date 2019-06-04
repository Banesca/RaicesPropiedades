export interface ISucursalesRs {
    msj: number;
    suculsales: ISucursales[];
  }
  
  export interface ISucursales {
    idSucursal?: number;
    nombreSucursal: string;
    telefonoSucursal: string;
    emailSucursal: string;
    direccionSucursal: string;
  }
  
  export class Sucursales {
    static empy() {
      return {
        idSucursal: null,
        nombreSucursal: '',
        telefonoSucursal: '',
        emailSucursal: '',
        direccionSucursal: ''
      } as ISucursales;
    }
  }

