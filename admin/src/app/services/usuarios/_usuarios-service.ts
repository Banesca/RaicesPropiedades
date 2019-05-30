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

  nuevaCategoria(pCategoria: IUsuarios) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post(environment.apiHost + '/api/v1/crearUser/' + lCategoria, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  actualizarCategoria(pCategoria: IUsuarios, pKey: string) {
    const lCategoria = JSON.stringify(pCategoria);
    return this._HttpClient
      .post(environment.apiHost +  '/api/auth/editarUser/' + pKey, lCategoria, {
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
      .delete(environment.apiHost +  '/api/auth/borrarUser/' + pKey, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      ).toPromise();
  }
}
