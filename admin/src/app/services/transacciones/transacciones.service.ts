import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { ITransacciones, ITransaccionesRs } from './transacciones.interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: "root"
})
export class TransaccionesService {
  private mService = "/api/v1/transacciones";
  private mUrl: string;
  constructor(private _HttpClient: HttpClient) {}

  All() {
    return this._HttpClient
      .get(environment.apiHost + this.mService + "/listar", {
        headers: getHeaders()
      })
      .pipe(
        map((res: ITransaccionesRs) => {
          return res;
        })
      )
      .toPromise();
  }

  actualizarCategoria(pCategoria: ITransacciones, pKey: number) {
    return this._HttpClient
      .post(environment.apiHost + this.mService + "/edit/" + pKey, pCategoria, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  eliminarCategoria(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + this.mService + "/eliminar/" + pKey, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  changeStateToCategoria(newStatus:string,pKey: number) {
    return this._HttpClient
      .post(
        environment.apiHost + this.mService + "/changestatus/" + pKey,
        { 'status': newStatus},
        {
          headers: getHeaders()
        }
      ).pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
}
