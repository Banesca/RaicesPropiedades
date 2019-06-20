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
  private accesToken: string = "EAAGTym1IYtIBAGJUo0OFKvcP77LmR0xtYIqa3dmD5KlpSrLY0ALqtj5TN6bStLpRDG3TYCslD0bKiCDRbqJrlQcdm2CH5KrV1SZCaGx4Ne94mVkhykxGQv5i7VUtRiIT2Xu3fmOAefWGHXp7CrEYjxH3iLV85G8d1KTgPylhKZCJD9vabHc3vf7GdT8mwdSESSaZAVWowZDZD"
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

  nuevaCategoria() {
    return this._HttpClient
      .post(this.mService + this.appId + '/feed',{ access_token: this.accesToken, 'message':'hello' }, { headers: getHeaders() })
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