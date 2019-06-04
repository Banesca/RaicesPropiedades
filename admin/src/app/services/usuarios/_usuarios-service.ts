import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IUsuarios, IUsuariosRs } from './usuarios-interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class _UsuariosService {
  private mService = 'categorias';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  }

  allCategorias() {
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/listarUsers/', {
        headers: getHeaders()
      })
      .pipe(
        map((data: IUsuariosRs) => {
          return data;
        })
      )
      .toPromise();
  }

  nuevaCategoria(Categoria: any,) {
    return this._HttpClient
      .post<any>(environment.apiHost + '/api/v1/crearUser/', Categoria, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  actualizarCategoria(Categoria: any, pKey: number) {
    return this._HttpClient
      .post(environment.apiHost +  '/api/auth/editarUser/' + pKey + '/', Categoria, {
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
      .delete(environment.apiHost +  '/api/auth/borrarUser/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }


  filtrarUsuarios(data:any) {
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/buscadorPersonas/', data, {
        headers: getHeaders()
      })
      .pipe(
        map((res: any) => {
          return res;
        })
      )
      .toPromise();
  }

}
