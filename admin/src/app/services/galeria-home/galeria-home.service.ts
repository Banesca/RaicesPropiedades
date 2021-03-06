import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { IGaleriaRs, IGaleria} from '../galeria-home/galeria-home.interface'
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: "root"
})
export class GaleriaHomeService {
  private mService = "/api/v1/galeria";
  private mUrl: string;
  constructor(private _HttpClient: HttpClient) {}

  allGalerias() {
    return this._HttpClient
      .get(environment.apiHost + this.mService + "/galeria", {
        headers: getHeaders()
      })
      .pipe(
        map((res: IGaleriaRs) => {
          return res;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: FormData) {
    return this._HttpClient
      .post<any>(environment.apiHost + this.mService + "/store", pCategoria, {
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
  actualizarCategoria(pCategoria: IGaleria, pKey: number) {
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

  filter(data: any) {
    return this._HttpClient
      .post(environment.apiHost + this.mService + "/filter", data, {
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
