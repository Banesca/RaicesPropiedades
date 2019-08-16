import { ConfigService } from "./../config/config.service";
import { IMonedas, ITipoPropiedad, IOrientacion } from "./articulo.interface";
import { getHeaders } from "../../misc/Headers";

import { Injectable } from "@angular/core";
import { HttpClient } from "@angular/common/http";
import { Observable, of, BehaviorSubject, Subject } from "rxjs";
import { map } from "rxjs/operators";

@Injectable({
  providedIn: "root"
})
/** Class Articulo CRUD por medio de un servicio web */
export class ArticuloService {
  /** Nombre de recurso ha obtener en la API */
  private mService = "/api/v1/";
  /** Url obtenida del servicio de configuracion */
  private mUrl: string;
  public filter: BehaviorSubject<any> = new BehaviorSubject([]);
  public search: BehaviorSubject<boolean> = new BehaviorSubject(false);

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
  getMonedas() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "getMonedas", {
        headers: getHeaders()
      })
      .pipe(
        map((data: IMonedas) => {
          return data;
        })
      )
      .toPromise();
  }

  getTipoPropiedad() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "getTipoPropiedad", {
        headers: getHeaders()
      })
      .pipe(
        map((data: ITipoPropiedad) => {
          return data;
        })
      )
      .toPromise();
  }

  getOrientacion() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "getOrientacion", {
        headers: getHeaders()
      })
      .pipe(
        map((data: IOrientacion) => {
          return data;
        })
      )
      .toPromise();
  }

  getTipoOperacion() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "getTipoOperacion", {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  getProvinces() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "provincias/get", {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  getPartidos(formData) {
    return this._HttpClient
      .post(this.mUrl + this.mService + "partidos/get", formData, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  getLocalidades(formData) {
    return this._HttpClient
      .post(this.mUrl + this.mService + "localidades/get", formData, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  getBarrios(formData) {
    return this._HttpClient
      .post(this.mUrl + this.mService + "barrios/get", formData, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  
  getItemsBySearch(formData) {
    return this._HttpClient
      .post(this.mUrl + this.mService + "buscadorGeneral", formData, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
}
