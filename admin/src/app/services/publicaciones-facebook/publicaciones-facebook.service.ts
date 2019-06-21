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
  private accesToken: string = "EAAGTym1IYtIBAE3DidHhTC4aummBExZAKaPhVZBDBn3LwzpCSa6x9GtwXH3is8P2cuAHvSvSyGni36hHVT7kwTzY6ORUMArHUVaUmNOmaetsebb9xylxAoIN76M7FtuEB3dZAEoSIjq04tdSAkRRnCIO4O7ZAQl0eqGlyeaav6kSqdLd3QTdkPIYL9zOLNp4gPZAfllarXwZDZD"
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