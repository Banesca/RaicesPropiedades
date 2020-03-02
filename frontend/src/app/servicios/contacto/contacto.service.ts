import { ConfigService } from "./../config/config.service";
import { IContacto } from "./contacto.interface";
import { ICategoriaRs } from "../categoria/categoria.interface";
import { getHeaders } from "../../misc/Headers";

import { Injectable } from "@angular/core";
import { HttpClient, HttpHeaders } from "@angular/common/http";
import { map } from "rxjs/operators";

@Injectable({
  providedIn: "root"
})
/** Class Contacto CRUD por medio de un servicio web */
export class ContactoService {
  /** Nombre de recurso ha obtener en la API */
  private mService = "/api/v1/transacciones";
  private mServicepago = "/api/v1/pago";

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
   * Obtiene todos los contactos y las devuelve por medio de una interface de tipo IContacto
   * @parametro no necesita parametros de entrada
   * @returns Coleccion de datos de tipo IContacto
   */
  All() {
    return this._HttpClient
      .get(this.mUrl + this.mService + "/categorias", {
        headers: getHeaders()
      })
      .pipe(
        map((res: ICategoriaRs) => {
          return res;
        })
      )
      .toPromise();
  }

  /**
   * Almacena un nuevo contacto de tipo IContacto
   * @IContacto Recibe un objeto del tipo IContacto como parametro
   * @returns Item de dato de Tipo IContacto
   */
  New(pContacto) {
    return this._HttpClient
      .post(this.mUrl + this.mService + "/store", pContacto)
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }


  NewPayment(payment) {
    return this._HttpClient
      .post(this.mUrl + this.mServicepago + "/add", payment)
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  NewContact(pContacto: IContacto) {
    return this._HttpClient
      .post(this.mUrl + "/api/v1/addContactanos", pContacto, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  NewContactPropiedad(pContacto: any) {
    return this._HttpClient
      .post(this.mUrl + "/api/v1/propiedad/addContactanos", pContacto, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  /**
   * Actualiza una tupla de tipo IContacto
   * @IContacto Recibe un objeto del tipo IContacto como parametro
   * @pKey Recibe la llave primaria del objeto IContacto de tipo string
   * @returns Item de dato de Tipo IContacto
   */
  Update(pContacto: IContacto, pKey: string) {
    const lContacto = JSON.stringify(pContacto);
    return this._HttpClient
      .patch(this.mUrl + this.mService + "/" + pKey, lContacto, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  /**
   * Elimina una tupla de tipo IContacto
   * @pKey Recibe la llave primaria del objeto IContacto de tipo string
   * @returns Respuesta de elimado exitosamente
   */
  Delete(pKey: string) {
    return this._HttpClient
      .delete(this.mUrl + this.mService + "/" + pKey, {
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
