import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IModulos, IModulosRs } from './modulos.interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class ModulosService {
  private mService = '/api/v1/modulo';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  } 

  All() { 
    return this._HttpClient
      .post(environment.apiHost + this.mService + '/listar', {
        headers: getHeaders()
      })
      .pipe(
        map((res: IModulosRs) => {
          return res;
        })
      )
      .toPromise();
  }

  actualizarCategoria(pCategoria: IModulos, pKey: number) {
    console.log(pCategoria)
    return this._HttpClient
      .post(environment.apiHost +  this.mService + '/edit/' + pKey + '/', pCategoria, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

  eliminarCategoria(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + this.mService + '/eliminar/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
}
