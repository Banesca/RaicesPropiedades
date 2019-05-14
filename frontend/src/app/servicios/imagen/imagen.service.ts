import { ConfigService } from './../config/config.service';
import { IImagen } from './imagen.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Imagen CRUD por medio de un servicio web */
export class ImagenService {
  /** Nombre de recurso ha obtener en la API */
  private mService = 'imagenes';
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
   * Obtiene todas las imagenes y las devuelve por medio de una interface de tipo IImagen
   * @parametro no necesita parametros de entrada
   * @returns Coleccion de datos de tipo IImagen
   */
  All() {
    return this._HttpClient.get(this.mUrl + this.mService, {
      headers: getHeaders()
    }).pipe(
      map((data: IImagen) => {
        return data;
      })).toPromise();
  }

  /**
  * Almacena una nueva imagen de tipo IImagen
  * @IImagen  Recibe un objeto del tipo IImagen como parametro
  * @returns Item de dato de Tipo IImagen
  */
  New(pImagen: IImagen) {
    const lImagen = JSON.stringify(pImagen);
    return this._HttpClient.post(this.mUrl + this.mService, lImagen, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
  * Actualiza una tupla de tipo IImagen
  * @IImagen Recibe un objeto del tipo IImagen como parametro
  * @pKey Recibe la llave primaria del objeto IImagen de tipo string
  * @returns Item de dato de Tipo IImagen
  */
  Update(pImagen: IImagen, pKey: string) {
    const lImagen = JSON.stringify(pImagen);
    return this._HttpClient.patch(this.mUrl + this.mService + '/' + pKey, lImagen, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
* Elimina una tupla de tipo IImagen
* @pKey Recibe la llave primaria del objeto IImagen de tipo string
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
