export interface IModulosRs {
    msj: string;
    modulos: IModulos[];
  }
  
  export interface IModulos {
    idMosulo: number;
    modulo: string;
    descripcion: string;
    url: string;
    iconomodulo: string;
  
  }

  export class Modulos {
    static empy() {
      return {
        idMosulo: null,
        modulo: '',
        descripcion: '', 
        url: '', 
        iconomodulo: '', 
      } as IModulos;
    }
  }
  