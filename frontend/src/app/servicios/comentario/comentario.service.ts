
import { ConfigService } from './../config/config.service';
import { IComentario, IComentarioRs } from './comentario.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Comenentario CRUD por medio de un servicio web */
export class ComentarioService  {
  /** Nombre de recurso ha obtener en la API */
  private mService = 'comentarios';
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
    //this.mUrl = this._ConfigService.mCfgStatic.UrlAPI;
  }

  /**
   * Obtiene todos los comentarios y las devuelve por medio de una interface de tipo IComentario
   * @parametro no necesita parametros de entrada
   * @returns Coleccion de datos de tipo IComentario
   */
  All() {
    return this._HttpClient.get(this.mUrl + this.mService, {
      headers: getHeaders()
    }).pipe(
      map((data: IComentarioRs) => {
        return data;
      })).toPromise();
  }

  /**
  * Almacena un nuevo comentario de tipo IComentario
  * @ICometario  Recibe un objeto del tipo IComentario como parametro
  * @returns Item de dato de Tipo IComentario
  */
  New(pComentario: IComentario) {
    const lComentario = JSON.stringify(pComentario);
    return this._HttpClient.post(this.mUrl + this.mService, lComentario, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
  * Actualiza una tupla de tipo ICometnario
  * @IComentario Recibe un objeto del tipo IComentario como parametro
  * @pKey Recibe la llave primaria del objeto IComentario de tipo string
  * @returns Item de dato de Tipo IComentario
  */
  Update(pComentario: IComentario, pKey: string) {
    const lComentario = JSON.stringify(pComentario);
    return this._HttpClient.patch(this.mUrl + this.mService + '/' + pKey, lComentario, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
* Elimina una tupla de tipo Icomentario
* @pKey Recibe la llave primaria del objeto IComentario de tipo string
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
