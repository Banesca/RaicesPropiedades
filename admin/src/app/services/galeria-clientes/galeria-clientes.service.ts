import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { getHeaders } from '../../misc/Headers';
import { IGaleriaCl, IGaleriaClientes } from './galeria-clientes.interface';

@Injectable({
  providedIn: "root"
})
export class GaleriaClientesService {
  private mService = "/api/auth/banner";
  private mUrl: string;
  constructor(private _HttpClient: HttpClient) {}

  allGalerias() {
    return this._HttpClient
      .get(environment.apiHost + this.mService + "/listar", {
        headers: getHeaders()
      })
      .pipe(
        map((res: IGaleriaCl) => {
          return res;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: FormData) {
    return this._HttpClient
      .post<any>(environment.apiHost + this.mService + "/add", pCategoria, {
        headers: new HttpHeaders({
          "Access-Control-Allow-Origin": "*",
          Authorization: "Bearer " + localStorage.getItem("access_token")
        })
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }
  actualizarCategoria(pCategoria: IGaleriaClientes, pKey: number) {
    alert(localStorage.getItem("access_token"))
    return this._HttpClient
      .post<any>(environment.apiHost + this.mService + "/edit/" + pKey, {
        pCategoria,
        headers: new HttpHeaders({
          "Access-Control-Allow-Origin": "*",
          Authorization: "Bearer " + localStorage.getItem("access_token")
        })
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
      .delete(environment.apiHost + this.mService + "/borrar/" + pKey, {
        headers: getHeaders()
      })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  byid(pKey: number) {
    return this._HttpClient
      .delete(environment.apiHost + this.mService + "/listar/" + pKey, {
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
