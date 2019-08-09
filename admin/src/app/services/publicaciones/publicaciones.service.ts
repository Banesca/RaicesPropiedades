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

}
