import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class PublicacionesFacebookService {
  private mService = 'https://graph.facebook.com/';
  private accesToken: string = "EAAGTym1IYtIBAIGOD5tlCt3iprOyUTjrG7SmxpjCSdphZAa7ZCNPp6dK3H3HCDXb6ALcMO1qPli0E4kDft1JP5PQh59bnbtKO5LjAu2LoVcfXPPqBkaHAreikefAFa9WttXwSMZAMsZBzgyPFmkyA9SVQF0xZC65Hjjv6BwSZAaM69eLgUEbqFZBPVvKgp4Ox8dHlYqR0R1ZAQZDZD"
  private appId= "866743800366542"
  constructor(
    private _HttpClient: HttpClient) {
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
}