
import { ConfigService } from './../config/config.service';
import { ICategoria, ICategoriaRs } from './categoria.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})
/** Class Categoria CRUD por medio de un servicio web */
export class CategoriaService {
  /** Nombre de recurso ha obtener en la API */
  private mService = 'categorias';
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
      map((data: ICategoriaRs) => {
        return data;
      })).toPromise();
  }

  /**
  * Almacena una nueva categoria de tipo ICategoria
  * @ICategoria  Recibe un objeto del tipo ICategoria como parametro
  * @returns Item de dato de Tipo Icategoria
  */
  New(pCategoria: ICategoria) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient.post(this.mUrl + this.mService, lCategoria, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
  * Actualiza una tupla de tipo Icategoria 
  * @ICategoria Recibe un objeto del tipo ICategoria como parametro
  * @pKey Recibe la llave primaria del objeto ICategoria de tipo string
  * @returns Item de dato de Tipo Icategoria
  */
  Update(pCategoria: ICategoria, pKey: string) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient.patch(this.mUrl + this.mService + '/' + pKey, lCategoria, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }

  /**
* Elimina una tupla de tipo Icategoria 
* @pKey Recibe la llave primaria del objeto ICategoria de tipo string
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
