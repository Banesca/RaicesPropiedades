import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IModulos, IModulosRs } from './modulos.interface'
import { getHeaders } from '../../misc/Headers';

/*
  Creado Por Breiddy Monterrey 17/6/2019
*/

@Injectable({
  providedIn: 'root'
})
export class ModulosService {
  private mService = '/api/auth/modulo';
  private mServiceL = '/api/v1/modulo';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  } 

  All() { 
    return this._HttpClient
      .post(environment.apiHost + this.mServiceL + '/listar', {
        headers: getHeaders()
      })
      .pipe(
        map((res: IModulosRs) => {
          return res;
        })
      )
      .toPromise();
  }

  moduloUsuario(idUsuario) { 
   
    return this._HttpClient
      .get(environment.apiHost + '/api/auth/usuario' + '/modulo'+'/'+idUsuario, {
        headers: getHeaders()
      })
      .pipe(
        map((res: IModulosRs) => {
          return res;
        })
      )
      .toPromise();
  }

  eliminarCategoria(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost +  '/api/auth/borrarUser/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

  nuevoModulo(pModulo: IModulos) {
    return this._HttpClient
      .post(environment.apiHost + this.mService + '/agregar', pModulo, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  actualizarModulos(pModulo: IModulos, pKey: number) {
    console.log(pModulo)
    return this._HttpClient
      .post(environment.apiHost +  this.mService + '/editar/' + pKey + '/', pModulo, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

  eliminarModulos(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + this.mService + '/borrar/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
}
