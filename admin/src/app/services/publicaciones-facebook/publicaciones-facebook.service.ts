import { IFacebookPostRs, IFacebookPost } from './publicaciones-facebook.interface'
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class PublicacionesFacebookService {
  private mService = 'https://graph.facebook.com/';
  private accesToken: string = "EAAGTym1IYtIBAKdPYdEFOZAZC3ww6cDNjbeosAVm67zXBcZAxyYjzIHSGwDHKKNkAiS6Lbdj4xo17ppq7Skazm7CGDv6QzIhIEYTim2NSIbKe5VhhhZAuUi99BZCsiZBPDJWZCVCW17OQZAqTIpOMBOZAtZAwILzWOgNtg1L67QEvL1AZDZD"
  private appId= "866743800366542"
  constructor(
    private _HttpClient: HttpClient) {
  }
  
  getAll() {
    return this._HttpClient
    .get(this.mService + this.appId + `/feed?access_token=${this.accesToken}`,{ headers: getHeaders() })
        .pipe(
        map((res: IFacebookPostRs) => {
          return res;
        })
      )
      .toPromise();
  }

  nuevaCategoria(pCategoria: IFacebookPost) {
    console.log(pCategoria)
    return this._HttpClient
      .post(this.mService + this.appId + `/feed?access_token=${this.accesToken}`, pCategoria , { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

    actualizarCategoria(pCategoria: IFacebookPost, id: number) {
    console.log(pCategoria)
    return this._HttpClient
      .post(this.mService + id + `?access_token=${this.accesToken}`, pCategoria , { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

  eliminarCategoria(id: number) {
    return this._HttpClient
      .delete(this.mService + id + `?access_token=${this.accesToken}`, { headers: getHeaders() })
      .pipe(
        map((data: any) => {
          return data;
        })
      )
      .toPromise();
  }

}