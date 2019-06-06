import { ConfigService } from './../config/config.service';
import { IConfigG } from './configuracion-general.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Categoria CRUD por medio de un servicio web */
export class ConfiguracionGeneralService {
  /** Nombre de recurso ha obtener en la API */
  private mService = '/api/v1/config/get';
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
      map((data: IConfigG) => {
        return data;
      })).toPromise();
  }

}
