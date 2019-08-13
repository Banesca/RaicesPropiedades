import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class PublicacionesService {
  private mService = '/api/v1/';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  }

  All() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'listarPropiedades', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getEstadoPublicacion() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getEstadoPublicacion', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoPropiedad() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoPropiedad', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoUnidadDepartamento() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoUnidadDepartamento', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoUnidadCasa() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoUnidadCasa', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoCochera() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoCochera', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoLocal() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoLocal', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoHotel() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoHotel', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoTerreno() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoTerreno', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoCampo() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoCampp', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoFondoComercio() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoFondoComercio', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoOperacion() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoOperacion', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getEstadoPropiedad() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getEstadoPropiedad', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getMonedas() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getMonedas', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getPaises() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'paises/get', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getProvincias() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'provincias/get', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getPartidos(idProvincia: number) {
    let data = {
      idProvincia: idProvincia
    }
    return this._HttpClient.post(environment.apiHost + this.mService + 'partidos/get', data, {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getRegiones() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'regiones/get', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getLocalidades(idRegion: number) {
    let data = {
      idRegion: idRegion
    }
    return this._HttpClient.post(environment.apiHost + this.mService + 'localidades/get', data, {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getDisposicion() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getDisposicion', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getOrientacion() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getOrientacion', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoBalcon() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoBalcon', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoExpensas() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoExpensas', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoVista() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoVista', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoCosta() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoCosta', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

  getTipoTecho() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'getTipoTecho', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;

      })).toPromise();
  }

}
