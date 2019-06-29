import { environment } from '../../../environments/environment';
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { map } from 'rxjs/operators';
import { getHeaders } from '../../misc/Headers';

@Injectable({
  providedIn: 'root'
})
export class PublicacionesService {
  private mService = '/api/v1/';
  private mUrl: string;
  constructor(
    private _HttpClient: HttpClient) {
  } 

  All() {
    return this._HttpClient.get(environment.apiHost + this.mService + 'listarPropiedades', {
      headers: getHeaders()
    }).pipe(
      map((data: any[]) => {
        return data;
       
      })).toPromise();
  }
}
