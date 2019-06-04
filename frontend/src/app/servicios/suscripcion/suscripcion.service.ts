import { ConfigService } from './../config/config.service';
import { ISuscripcion } from './suscripcion.interface';
import { getHeaders } from '../../misc/Headers';

import { Injectable } from '@angular/core';
import { HttpClient} from '@angular/common/http';
import { map } from 'rxjs/operators';

@Injectable({
  providedIn: 'root'
})

/** Class Suscripcion C por medio de un servicio web */
export class SuscripcionService {

/** Nombre de recurso ha obtener en la API */
private mService = '/api/v1/suscripcion/';
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
  * Almacena una nueva Suscripcion de tipo ISuscripcion
  * @ICategoria  Recibe un objeto del tipo ISuscripcion como parametro
  * @returns Item de dato de Tipo Isuscripcion
  */
  New(pSuscripcion: ISuscripcion) {
    const lSuscripcion = JSON.stringify(pSuscripcion);
    return this._HttpClient.post(this.mUrl + this.mService, lSuscripcion, {
      headers: getHeaders()
    }).pipe(
      map((data: any) => {
        return data;
      })).toPromise();
  }
}