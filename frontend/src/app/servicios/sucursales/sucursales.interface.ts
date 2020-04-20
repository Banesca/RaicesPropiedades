export interface ISucursales {
    msj: string;
    suculsales: ISucursal[];
}
export interface ISucursal {
    idSucursal: number;
    nombreSucursal?: string;
    telefonoSucursal: string;
    emailSucursal: string;
    direccionSucursal: string;
}