
import { ConfigService } from './../config/config.service';
import { IArticulo, IArticuloRs } from './articulo.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Articulo CRUD por medio de un servicio web */
export class ArticuloService {
  /** Nombre de recurso ha obtener en la API */
  private mService = 'articulos';
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
   * Obtiene todas los articulos y las devuelve por medio de una interface de tipo IArticulo
   * @parametro no necesita parametros de entrada
   * @returns Coleccion de datos de tipo IArticulo
   */
  All() {
    return this._HttpClient.get(this.mUrl + this.mService, {
      headers: getHeaders()
    }).pipe(
      map((data: IArticuloRs) => {
        return data;
      })).toPromise();
  }

  getArticle(pKey: string) {
    const url = `${this.mUrl + this.mService}/detail/`;
    return this._HttpClient.get(url + pKey, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }


  /**
  * Almacena una nuevo articulo de tipo IArticulo
  * @IArticulo  Recibe un objeto del tipo IArticulo como parametro
  * @returns Item de dato de Tipo IArticulo
  */
  New(pArticulo: IArticulo) {
    const lArticulo = JSON.stringify(pArticulo);
    return this._HttpClient.post(this.mUrl + this.mService, lArticulo, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
  * Actualiza una tupla de tipo IArticulo
  * @IArticulo Recibe un objeto del tipo IArticulo como parametro
  * @pKey Recibe la llave primaria del objeto IArticulo de tipo string
  * @returns Item de dato de Tipo IArticulo
  */
  Update(pArticulo: IArticulo, pKey: string) {
    const lArticulo = JSON.stringify(pArticulo);
    return this._HttpClient.patch(this.mUrl + this.mService + '/' + pKey, lArticulo, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
* Elimina una tupla de tipo IArticulo
* @pKey Recibe la llave primaria del objeto IArticulo de tipo string
* @returns Respuesta de elimado exitosamente
*/
  Delete(pKey: string) {
    return this._HttpClient.delete(this.mUrl + this.mService + '/' + pKey, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

}
