import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { ISucursales, ISucursalesRs } from './sucursales-interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class SucursalesService {
  private mService = 'categorias';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  }

  allCategorias() {
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/sucursal/listar', {
        headers: getHeaders()
      })
      .pipe(
        map((data: ISucursalesRs) => {
          return data;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: ISucursales) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post<any>(environment.apiHost + '/api/auth/sucursal/add/' + lCategoria, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  actualizarCategoria(pCategoria: ISucursales, pKey: number) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post<any>(environment.apiHost +  '/api/auth/sucursal/edit/' + pKey, lCategoria, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }

  eliminarCategoria(pKey: string) {
    return this._HttpClient
      .delete(environment.apiHost +  '/api/auth/sucursal/borrar/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
}
