import { ConfigService } from './../config/config.service';
import { getHeaders } from '../../misc/Headers';
import { IGaleriaRs, IGaleriaC} from '../galeria-home/galeria-home.interface'

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Categoria CRUD por medio de un servicio web */
export class GaleriaHomeService {
  /** Nombre de recurso ha obtener en la API */
  private mService = '/api/v1/galeria/galeria';
  private mServiceClientes = '/api/v1/banner/listar';

  /** Url obtenida del servicio de configuracion */
  private mUrl: string;

  /**
  * Create a point.
  * @parametro HttpClient - Cliente http para realizar peticiones.
  * @parametro ConfigService - Configuracion de Url dinamicas
  */
  constructor(
    private _HttpClient: HttpClient,
    private _ConfigService: ConfigService
  ) {
    this.mUrl = this._ConfigService.mCfgStatic.UrlAPI;
  }

  /**
   * Obtiene todas las categorias y las devuelve por medio de una interface de tipo ICategoria
   * @parametro no necesita parametros de entrada
   * @returns Coleccion de datos de tipo ICategoria
   */
  All() {
    return this._HttpClient.get(this.mUrl + this.mService, {
      headers: getHeaders()
    }).pipe(
      map((res: IGaleriaRs) => {
        return res;
       
      })).toPromise();
  }

  AllCliente() {
    return this._HttpClient.get(this.mUrl + this.mServiceClientes, {
      headers: getHeaders()
    }).pipe(
      map((res: IGaleriaC) => {
        return res;
       
      })).toPromise();
  }
  
}
